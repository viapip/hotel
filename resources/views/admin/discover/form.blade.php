<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($discover->title) ? $discover->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <br>
    <img src="{{ asset(isset($discover->image) ? $discover->image : '') }}" alt="" width="200px">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="image" id="banner" value="{{ isset($discover->image) ? $discover->image : ''}}">
        <label class="custom-file-label" for="image">{{ 'Image' }}</label>
    </div>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control full-editor" rows="5" name="description" type="textarea" id="description" >{{ isset($discover->description) ? $discover->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('from') ? 'has-error' : ''}}">
    <label for="from" class="control-label">{{ 'From' }}</label>
    <input class="form-control" name="from" type="text" id="from" value="{{ isset($discover->from) ? $discover->from : ''}}" >
    {!! $errors->first('from', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('latitude_a') ? 'has-error' : ''}}">
    <label for="latitude_a" class="control-label">{{ 'Latitude A' }}</label>
    <input class="form-control" name="latitude_a" type="text" id="latitude_a" value="{{ isset($discover->latitude_a) ? $discover->latitude_a : ''}}" >
    {!! $errors->first('latitude_a', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('longitude_a') ? 'has-error' : ''}}">
    <label for="longitude_a" class="control-label">{{ 'Longitude A' }}</label>
    <input class="form-control" name="longitude_a" type="text" id="longitude_a" value="{{ isset($discover->longitude_a) ? $discover->longitude_a : ''}}" >
    {!! $errors->first('longitude_a', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('latitude_b') ? 'has-error' : ''}}">
    <label for="latitude_b" class="control-label">{{ 'Latitude B' }}</label>
    <input class="form-control" name="latitude_b" type="text" id="latitude_b" value="{{ isset($discover->latitude_b) ? $discover->latitude_b : ''}}" >
    {!! $errors->first('latitude_b', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('longitude_b') ? 'has-error' : ''}}">
    <label for="longitude_b" class="control-label">{{ 'Longitude B' }}</label>
    <input class="form-control" name="longitude_b" type="text" id="longitude_b" value="{{ isset($discover->longitude_b) ? $discover->longitude_b : ''}}" >
    {!! $errors->first('longitude_b', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title_seo') ? 'has-error' : ''}}">
    <label for="title_seo" class="control-label">{{ 'Title Seo' }}</label>
    <input class="form-control" name="title_seo" type="text" id="title_seo" value="{{ isset($discover->title_seo) ? $discover->title_seo : ''}}" >
    {!! $errors->first('title_seo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description_seo') ? 'has-error' : ''}}">
    <label for="description_seo" class="control-label">{{ 'Description Seo' }}</label>
    <textarea class="form-control" rows="5" name="description_seo" type="textarea" id="description_seo" >{{ isset($discover->description_seo) ? $discover->description_seo : ''}}</textarea>
    {!! $errors->first('description_seo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
