<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Language;
use App\Models\MovieImage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'release_date',
        'rating',
        'runtime',
        'image',
        'description',
    ];

    //Always query with these relations
    public $with = ['genres', 'languages', 'countries', 'actors', 'images'];

    /**
     * @return BelongsToMany
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * @return BelongsToMany
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class);
    }

    /**
     * @return BelongsToMany
     */
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class);
    }

    /**
     * @return BelongsToMany
     */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(MovieImage::class);
    }

    public static function customCreate(Request $request): self
    {
        return DB::transaction(function () use ($request) {
            $image = $request->file('image');
            $inputs = $request->input();
            $inputs['image'] = $image?->getClientOriginalName() ?? 'noimage.jpg'; 

            $movie = self::create($inputs);
            $movie->syncAll($request);

            //Upload and insert multiple images 
            if ($images = $request->file('images')) {
                $images = $movie->uploadImages($images);
                $movie->insertImages($images);
            }

            //Upload cover image 
            if ($image = $request->file('image')) {
                $images = $movie->uploadImages([$image]);
            }

            return $movie;
        });
    }

    public function customUpdate(Request $request): self
    {
        DB::transaction(function () use ($request) {
            //Old images
            $oldImages = $request->input('old_images') ?? [];
            //Detach old images
            MovieImage::where('movie_id', $this->id)->whereNotIn('name', $oldImages)->forceDelete();

            //Upload and insert multiple images
           
            if ($images = $request->file('images')) {
                $images = $this->uploadImages($images);
                $this->insertImages($images);
            }

            //Upload cover image 
            $inputs = $request->input();
            if ($image = $request->file('image')) {
                $images = $this->uploadImages([$image]);
            }
             
            $inputs['image'] =  $request->file('image')?->getClientOriginalName() ?? $request->get('old_cover_image') ?? 'noimage.jpg'; 

            $this->syncAll($request)->fill($inputs)->save();
        });

        return $this;
    }

    public function insertImages($images): self
    {
        collect($images)->each(function (string $item, int $key) {
            MovieImage::updateOrCreate([
                'name' => $item,
                'movie_id' => $this->id
            ]);
        });

        return $this;
    }

    public function syncAll(Request $request): self
    {
        $this->genres()->sync($request->get('genres'));
        $this->countries()->sync($request->get('countries'));
        $this->languages()->sync($request->get('languages'));
        $this->actors()->sync($request->get('actors'));

        return $this;
    }

    public function uploadImages(array $images): array
    {
        $paths = [];
        foreach ($images as $image) {

            if (!$image instanceof UploadedFile) {
                throw new \Exception('Instance of Illuminate\Http\UploadedFile file expected');
            }

            $imageName = $image->getClientOriginalName();
            $paths[] = $imageName;

            if (Storage::exists("public/images/$imageName")) {
                continue;
            }

            $image->storeAs(
                'public/images',
                $image->getClientOriginalName()
            );
        }

        return $paths;
    }
}
