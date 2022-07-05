<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($homepage->title) ? $homepage->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">
    <label for="banner" class="control-label">{{ 'Banner' }}</label>
    <br>
    <img src="{{ asset(isset($homepage->banner) ? $homepage->banner : '') }}" alt="" width="200px">
    <div class="custom-file">
        <input type="file" multiple class="custom-file-input" name="banner" id="banner" value="{{ isset($homepage->banner) ? $homepage->banner : ''}}">
        <label class="custom-file-label" for="banner">{{ 'Banner' }}</label>
    </div>
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
    <textarea class="form-control full-editor" rows="5" name="about_text" type="textarea" id="about_text" >{{ isset($homepage->about_text) ? $homepage->about_text : ''}}</textarea>
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
    <br>
    <img src="{{ asset(isset($homepage->about_image) ? $homepage->about_image : '') }}" alt="" width="200px">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="about_image" id="about_image" value="{{ isset($homepage->about_image) ? $homepage->about_image : ''}}">
        <label class="custom-file-label" for="about_image">{{ 'About Image' }}</label>
    </div>
    {!! $errors->first('about_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rooms_title') ? 'has-error' : ''}}">
    <label for="rooms_title" class="control-label">{{ 'Rooms Title' }}</label>
    <input class="form-control" name="rooms_title" type="text" id="rooms_title" value="{{ isset($homepage->rooms_title) ? $homepage->rooms_title : ''}}" >
    {!! $errors->first('rooms_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rooms_text') ? 'has-error' : ''}}">
    <label for="rooms_text" class="control-label">{{ 'Rooms Text' }}</label>
    <textarea class="form-control full-editor" rows="5" name="rooms_text" type="textarea" id="rooms_text" >{{ isset($homepage->rooms_text) ? $homepage->rooms_text : ''}}</textarea>
    {!! $errors->first('rooms_text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('rooms_items') ? 'has-error' : ''}}">
    <label for="rooms_items" class="control-label">{{ 'Rooms Items' }}</label>
    <input class="form-control" name="rooms_items" type="text" id="rooms_items" value="{{ isset($homepage->rooms_items) ? $homepage->rooms_items : ''}}" >
    {!! $errors->first('rooms_items', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label>{{ 'Rooms Items' }}</label>
    <select name="rooms_items[]" id="rooms_items" class="select2" multiple="multiple"
            data-placeholder="Choose rooms" style="width: 100%;">
        @foreach($rooms as $id => $title)
            <option value="{{ $id }}" @if(isset($homepage->rooms) && in_array($id, $homepage->rooms->pluck('id')->all())) selected @endif >{{ $title }}</option>
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('quality_title') ? 'has-error' : ''}}">
    <label for="quality_title" class="control-label">{{ 'Quality Title' }}</label>
    <input class="form-control" name="quality_title" type="text" id="quality_title" value="{{ isset($homepage->quality_title) ? $homepage->quality_title : ''}}" >
    {!! $errors->first('quality_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quality_text') ? 'has-error' : ''}}">
    <label for="quality_text full-editor" class="control-label">{{ 'Quality Text' }}</label>
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
    <input class="form-control" name="quality_link" type="text" id="quality_link" value="{{ isset($homepage->quality_link) ? $homepage->quality_link : ''}}" >
    {!! $errors->first('quality_link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title_seo') ? 'has-error' : ''}}">
    <label for="title_seo" class="control-label">{{ 'Title Seo' }}</label>
    <input class="form-control" name="title_seo" type="text" id="title_seo" value="{{ isset($homepage->title_seo) ? $homepage->title_seo : ''}}" >
    {!! $errors->first('title_seo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description_seo') ? 'has-error' : ''}}">
    <label for="description_seo" class="control-label">{{ 'Description Seo' }}</label>
    <textarea class="form-control" rows="5" name="description_seo" type="textarea" id="description_seo" >{{ isset($homepage->description_seo) ? $homepage->description_seo : ''}}</textarea>
    {!! $errors->first('description_seo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
