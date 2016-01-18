

@inject('countries', 'App\Http\Utilities\Country')

{{csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" id="street" class="form-control" value="{{old('street')}}" required>
        </div>

        <!-- Text field for inserting city -->
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" class="form-control" value="{{old('city')}}" required>
        </div>

        <!-- Text field for inserting zip -->
        <div class="form-group">
            <label for="zip">Zip/Postal code:</label>
            <input type="text" name="zip" id="zip" class="form-control" value="{{old('zip')}}" required>
        </div>

        <!-- Select field for inserting country -->
        <div class="form-group">
            <label for="country">Country:</label>
            <select name="country" id="country" class="form-control" required>
                @foreach($countries::all() as $code => $country )
                    <option value="{{ $code }}"> {{ $country }} </option>
                @endforeach
            </select>
        </div>

        <!-- Text field for inserting state -->
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" name="state" id="state" class="form-control" value="{{old('state')}}">
        </div>
    </div>

    <div class="col-md-6">
        <!-- Text field for inserting price -->
        <div class="form-group">
            <label for="price">Sales Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}" required>
        </div>

        <!-- Text area for inserting description -->
        <div class="form-group">
            <label for="description">Home description:</label>
                    <textarea type="text" name="description" id="description" class="form-control" rows="10" required   >
                        {{old('description')}}
                    </textarea>
        </div>
    </div>
</div>
{{--<!-- Field for inserting photos -->
<div class="form-group">
    <label for="photos">Photos:</label>
    <input type="file" name="photos" id="photos" class="form-control" value="{{old('photos')}}">
</div>--}}

<div class="col-md-12">
    <hr>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create Flyer</button>
    </div>
</div>