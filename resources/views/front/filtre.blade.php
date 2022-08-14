<div class="col-6 m-2">
    <div class="form-group div-btn-box1">
        <select class="form-control" name="country_id">
            <option value="0" >Filter by Country</option>
            @foreach($hotels as $hotel)
            <option value="{{$hotel->country_id}}">{{$hotel->country_name}}</option>
            @endforeach
        </select>
        <div class="controls m-1">
            <button class="btn btn-sm btn-info" type="submit">Filter</button>
        </div>
    </div>
</div>
