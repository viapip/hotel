<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($locationhome->title) ? $locationhome->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    <label for="text" class="control-label">{{ 'Text' }}</label>
    <textarea class="form-control full-editor" rows="5" name="text" type="textarea" id="text" >{{ isset($locationhome->text) ? $locationhome->text : ''}}</textarea>
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <br>
    <button id="uploadZone" class="zoneUpload">
        Select Images
    </button>
    <ul id="dragZone" class="drag-zone">
    </ul>
{{--    <img src="{{ asset(isset($locationhome->image) ? $locationhome->image : '') }}" alt="" width="200px">--}}
    <div class="custom-file hidden">
        <input type="text" class="custom-file-input" name="image" id="banner" value="{{ isset($locationhome->image) ? $locationhome->image : ''}}">
        <label class="custom-file-label" for="image">{{ 'Image' }}</label>
    </div>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<script>
    const test = new DragDrop({zone: '#dragZone', input: '#banner', uploadZone: '#uploadZone'})
</script>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
