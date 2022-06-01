<div class="form-group {{ $errors->has('special_offer') ? 'has-error' : ''}}">
    <div class="custom-control custom-checkbox">
        <input type="hidden" name="special_offer" value="0">
        <input class="custom-control-input custom-control-input-blue custom-control-input-outline" type="checkbox" id="special_offer" name="special_offer" value="1"
               @if(isset($room->special_offer) && $room->special_offer) checked @endif>
        <label for="special_offer" class="custom-control-label">{{ 'Special Offer' }}</label>
    </div>
    {!! $errors->first('special_offer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title"
           value="{{ isset($room->title) ? $room->title : ''}}">
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('preview_image') ? 'has-error' : ''}}">
    <label for="preview_image" class="control-label">{{ 'Preview Image' }}</label>
    <br>
    <img src="{{ asset(isset($room->preview_image) ? $room->preview_image : '') }}" alt="" width="200px">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="preview_image" id="preview_image"
               value="{{ isset($room->preview_image) ? $room->preview_image : ''}}">
        <label class="custom-file-label" for="preview_image">{{ 'Preview Image' }}</label>
    </div>
    {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
    <label for="images" class="control-label">{{ 'Images' }}</label>
    <textarea class="form-control" rows="5" name="images" type="textarea"
              id="images">{{ isset($room->images) ? $room->images : ''}}</textarea>
    {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('meters') ? 'has-error' : ''}}">
    <label for="meters" class="control-label">{{ 'Meters' }}</label>
    <input class="form-control" name="meters" type="text" id="meters"
           value="{{ isset($room->meters) ? $room->meters : ''}}">
    {!! $errors->first('meters', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control full-editor" rows="5" name="description" type="textarea"
              id="description">{{ isset($room->description) ? $room->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('features') ? 'has-error' : ''}}">
    <label for="features" class="control-label">{{ 'Features' }}</label>
    <textarea class="form-control" rows="5" name="features" type="textarea"
              id="features">{{ isset($room->features) ? $room->features : ''}}</textarea>
    {!! $errors->first('features', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label>{{ 'Features' }}</label>
    <select name="features[]" id="features" class="select2" multiple="multiple"
            data-placeholder="Choose feature" style="width: 100%;" required>
        @foreach($features as $id => $title)
            <option value="{{ $id }}" @if(isset($room->features) && in_array($id, $room->features->pluck('id')->all())) selected @endif >{{ $title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="text" id="price"
           value="{{ isset($room->price) ? $room->price : ''}}">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" name="link" type="text" id="link" value="{{ isset($room->link) ? $room->link : ''}}">
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('other_rooms') ? 'has-error' : ''}}">
    <label for="other_rooms" class="control-label">{{ 'Other Rooms' }}</label>
    <textarea class="form-control" rows="5" name="other_rooms" type="textarea"
              id="other_rooms">{{ isset($room->other_rooms) ? $room->other_rooms : ''}}</textarea>
    {!! $errors->first('other_rooms', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title_seo') ? 'has-error' : ''}}">
    <label for="title_seo" class="control-label">{{ 'Title Seo' }}</label>
    <input class="form-control" name="title_seo" type="text" id="title_seo"
           value="{{ isset($room->title_seo) ? $room->title_seo : ''}}">
    {!! $errors->first('title_seo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description_seo') ? 'has-error' : ''}}">
    <label for="description_seo" class="control-label">{{ 'Description Seo' }}</label>
    <textarea class="form-control" rows="5" name="description_seo" type="textarea"
              id="description_seo">{{ isset($room->description_seo) ? $room->description_seo : ''}}</textarea>
    {!! $errors->first('description_seo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
