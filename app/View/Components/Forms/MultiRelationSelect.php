<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class MultiRelationSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Model $model, 
        public string $tagName, 
        public Collection $relationItems, 
        public string $relationName = "", 
        public string $optionName = ""
        )
    {
        if(!$this->relationName){
            $this->relationName = $this->tagName;
        }
    }
    public function selected($relationItems){
        
        return $this->model->{$this->relationName}->contains($relationItems->id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.multi-relation-select');
    }
}
