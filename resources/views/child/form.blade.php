<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $child?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="middlename" class="form-label">{{ __('Middlename') }}</label>
            <input type="text" name="middlename" class="form-control @error('middlename') is-invalid @enderror" value="{{ old('middlename', $child?->middlename) }}" id="middlename" placeholder="Middlename">
            {!! $errors->first('middlename', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lastname" class="form-label">{{ __('Lastname') }}</label>
            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname', $child?->lastname) }}" id="lastname" placeholder="Lastname">
            {!! $errors->first('lastname', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="birthdate" class="form-label">{{ __('Birthdate') }}</label>
            <input type="text" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate', $child?->birthdate) }}" id="birthdate" placeholder="Birthdate">
            {!! $errors->first('birthdate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="photo" class="form-label">{{ __('Photo') }}</label>
            <input type="text" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo', $child?->photo) }}" id="photo" placeholder="Photo">
            {!! $errors->first('photo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="gender" class="form-label">{{ __('Gender') }}</label>
            <input type="text" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender', $child?->gender) }}" id="gender" placeholder="Gender">
            {!! $errors->first('gender', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="height" class="form-label">{{ __('Height') }}</label>
            <input type="text" name="height" class="form-control @error('height') is-invalid @enderror" value="{{ old('height', $child?->height) }}" id="height" placeholder="Height">
            {!! $errors->first('height', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="weight" class="form-label">{{ __('Weight') }}</label>
            <input type="text" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight', $child?->weight) }}" id="weight" placeholder="Weight">
            {!! $errors->first('weight', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $child?->description) }}" id="description" placeholder="Description">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>