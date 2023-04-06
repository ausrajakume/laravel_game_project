<label for="">{{$tagName}}</label>
<select name="{{$tagName}}[]" id="" multiple class="form-control select2bs4">


    @foreach ($relationItems as $relationItem)
    <option value="{{$relationItem->id}}" {{$selected($relationItem) ? 'selected' : ''}}>
        {{$optionName ? $relationItem->$optionName : $relationItem->name}}
    </option>
        
    @endforeach

</select>