<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($contact->title) ? $contact->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <textarea class="form-control" rows="5" name="image" type="textarea" id="image" >{{ isset($contact->image) ? $contact->image : ''}}</textarea>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <textarea class="form-control" rows="5" name="name" type="textarea" id="name" >{{ isset($contact->name) ? $contact->name : ''}}</textarea>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <textarea class="form-control" rows="5" name="address" type="textarea" id="address" >{{ isset($contact->address) ? $contact->address : ''}}</textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <textarea class="form-control" rows="5" name="phone" type="textarea" id="phone" >{{ isset($contact->phone) ? $contact->phone : ''}}</textarea>
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <textarea class="form-control" rows="5" name="email" type="textarea" id="email" >{{ isset($contact->email) ? $contact->email : ''}}</textarea>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title_seo') ? 'has-error' : ''}}">
    <label for="title_seo" class="control-label">{{ 'Title Seo' }}</label>
    <textarea class="form-control" rows="5" name="title_seo" type="textarea" id="title_seo" >{{ isset($contact->title_seo) ? $contact->title_seo : ''}}</textarea>
    {!! $errors->first('title_seo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description_seo') ? 'has-error' : ''}}">
    <label for="description_seo" class="control-label">{{ 'Description Seo' }}</label>
    <textarea class="form-control" rows="5" name="description_seo" type="textarea" id="description_seo" >{{ isset($contact->description_seo) ? $contact->description_seo : ''}}</textarea>
    {!! $errors->first('description_seo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
