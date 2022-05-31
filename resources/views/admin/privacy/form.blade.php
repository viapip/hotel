<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($privacy->title) ? $privacy->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <textarea class="form-control" rows="5" name="image" type="textarea" id="image" >{{ isset($privacy->image) ? $privacy->image : ''}}</textarea>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($privacy->description) ? $privacy->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title_seo') ? 'has-error' : ''}}">
    <label for="title_seo" class="control-label">{{ 'Title Seo' }}</label>
    <textarea class="form-control" rows="5" name="title_seo" type="textarea" id="title_seo" >{{ isset($privacy->title_seo) ? $privacy->title_seo : ''}}</textarea>
    {!! $errors->first('title_seo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description_seo') ? 'has-error' : ''}}">
    <label for="description_seo" class="control-label">{{ 'Description Seo' }}</label>
    <textarea class="form-control" rows="5" name="description_seo" type="textarea" id="description_seo" >{{ isset($privacy->description_seo) ? $privacy->description_seo : ''}}</textarea>
    {!! $errors->first('description_seo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
