<div class="form-group {{ $errors->has('under_title') ? 'has-error' : ''}}">
    <label for="under_title" class="control-label">{{ 'Under Title' }}</label>
    <input class="form-control" name="under_title" type="text" id="under_title" value="{{ isset($discoverblock->under_title) ? $discoverblock->under_title : ''}}" >
    {!! $errors->first('under_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($discoverblock->title) ? $discoverblock->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
