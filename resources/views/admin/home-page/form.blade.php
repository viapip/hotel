<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($homepage->title) ? $homepage->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">
    <label for="banner" class="control-label">{{ 'Banner' }}</label>
    <textarea class="form-control" rows="5" name="banner" type="textarea" id="banner" >{{ isset($homepage->banner) ? $homepage->banner : ''}}</textarea>
    {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('about_title') ? 'has-error' : ''}}">
    <label for="about_title" class="control-label">{{ 'About Title' }}</label>
    <input class="form-control" name="about_title" type="text" id="about_title" value="{{ isset($homepage->about_title) ? $homepage->about_title : ''}}" >
    {!! $errors->first('about_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('about_subtitle') ? 'has-error' : ''}}">
    <label for="about_subtitle" class="control-label">{{ 'About Subtitle' }}</label>
    <input class="form-control" name="about_subtitle" type="text" id="about_subtitle" value="{{ isset($homepage->about_subtitle) ? $homepage->about_subtitle : ''}}" >
    {!! $errors->first('about_subtitle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('about_text') ? 'has-error' : ''}}">
    <label for="about_text" class="control-label">{{ 'About Text' }}</label>
    <textarea class="form-control" rows="5" name="about_text" type="textarea" id="about_text" >{{ isset($homepage->about_text) ? $homepage->about_text : ''}}</textarea>
    {!! $errors->first('about_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('about_button') ? 'has-error' : ''}}">
    <label for="about_button" class="control-label">{{ 'About Button' }}</label>
    <input class="form-control" name="about_button" type="text" id="about_button" value="{{ isset($homepage->about_button) ? $homepage->about_button : ''}}" >
    {!! $errors->first('about_button', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('about_button_link') ? 'has-error' : ''}}">
    <label for="about_button_link" class="control-label">{{ 'About Button Link' }}</label>
    <input class="form-control" name="about_button_link" type="text" id="about_button_link" value="{{ isset($homepage->about_button_link) ? $homepage->about_button_link : ''}}" >
    {!! $errors->first('about_button_link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('about_image') ? 'has-error' : ''}}">
    <label for="about_image" class="control-label">{{ 'About Image' }}</label>
    <input class="form-control" name="about_image" type="text" id="about_image" value="{{ isset($homepage->about_image) ? $homepage->about_image : ''}}" >
    {!! $errors->first('about_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rooms_title') ? 'has-error' : ''}}">
    <label for="rooms_title" class="control-label">{{ 'Rooms Title' }}</label>
    <input class="form-control" name="rooms_title" type="text" id="rooms_title" value="{{ isset($homepage->rooms_title) ? $homepage->rooms_title : ''}}" >
    {!! $errors->first('rooms_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rooms_text') ? 'has-error' : ''}}">
    <label for="rooms_text" class="control-label">{{ 'Rooms Text' }}</label>
    <textarea class="form-control" rows="5" name="rooms_text" type="textarea" id="rooms_text" >{{ isset($homepage->rooms_text) ? $homepage->rooms_text : ''}}</textarea>
    {!! $errors->first('rooms_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rooms_items') ? 'has-error' : ''}}">
    <label for="rooms_items" class="control-label">{{ 'Rooms Items' }}</label>
    <input class="form-control" name="rooms_items" type="text" id="rooms_items" value="{{ isset($homepage->rooms_items) ? $homepage->rooms_items : ''}}" >
    {!! $errors->first('rooms_items', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location_image') ? 'has-error' : ''}}">
    <label for="location_image" class="control-label">{{ 'Location Image' }}</label>
    <input class="form-control" name="location_image" type="text" id="location_image" value="{{ isset($homepage->location_image) ? $homepage->location_image : ''}}" >
    {!! $errors->first('location_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location_title') ? 'has-error' : ''}}">
    <label for="location_title" class="control-label">{{ 'Location Title' }}</label>
    <input class="form-control" name="location_title" type="text" id="location_title" value="{{ isset($homepage->location_title) ? $homepage->location_title : ''}}" >
    {!! $errors->first('location_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location_text') ? 'has-error' : ''}}">
    <label for="location_text" class="control-label">{{ 'Location Text' }}</label>
    <textarea class="form-control" rows="5" name="location_text" type="textarea" id="location_text" >{{ isset($homepage->location_text) ? $homepage->location_text : ''}}</textarea>
    {!! $errors->first('location_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quality_title') ? 'has-error' : ''}}">
    <label for="quality_title" class="control-label">{{ 'Quality Title' }}</label>
    <input class="form-control" name="quality_title" type="text" id="quality_title" value="{{ isset($homepage->quality_title) ? $homepage->quality_title : ''}}" >
    {!! $errors->first('quality_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quality_text') ? 'has-error' : ''}}">
    <label for="quality_text" class="control-label">{{ 'Quality Text' }}</label>
    <textarea class="form-control" rows="5" name="quality_text" type="textarea" id="quality_text" >{{ isset($homepage->quality_text) ? $homepage->quality_text : ''}}</textarea>
    {!! $errors->first('quality_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quality_button') ? 'has-error' : ''}}">
    <label for="quality_button" class="control-label">{{ 'Quality Button' }}</label>
    <input class="form-control" name="quality_button" type="text" id="quality_button" value="{{ isset($homepage->quality_button) ? $homepage->quality_button : ''}}" >
    {!! $errors->first('quality_button', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quality_link') ? 'has-error' : ''}}">
    <label for="quality_link" class="control-label">{{ 'Quality Link' }}</label>
    <textarea class="form-control" rows="5" name="quality_link" type="textarea" id="quality_link" >{{ isset($homepage->quality_link) ? $homepage->quality_link : ''}}</textarea>
    {!! $errors->first('quality_link', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
