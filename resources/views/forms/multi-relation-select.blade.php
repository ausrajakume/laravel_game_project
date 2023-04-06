<label>@langTitle("app.$tagName")</label>
<select id="" name="{{$tagName}}[]" multiple class="form-control select2bs4">
    @foreach($relationItems as $relationItem)
        <option {{ ($selected($relationItem) ? 'selected' : '') }} value="{{$relationItem->id}}">
            {{$relationItem->$optionDisplay}}
        </option>
    @endforeach
</select>
