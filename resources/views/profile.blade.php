@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile Information') }}</div>

                <div class="card-body">
                    @if (session('status') == 'profile-information-updated')
                        <div class="alert alert-success" role="alert">
                            {{ __('Profile information saved successfully.') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('user/profile-information') }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name', 'updateProfileInformation') is-invalid @enderror" name="name" value="{{ old('name') ?? Auth::user()->name }}" required autocomplete="name" autofocus>

                                @error('name', 'updateProfileInformation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email', 'updateProfileInformation') is-invalid @enderror" name="email" value="{{ old('email') ?? Auth::user()->email }}" required autocomplete="email" readonly="readonly">

                                @error('email', 'updateProfileInformation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">{{ __('Password') }}</div>

                <div class="card-body">
                    @if (session('status') == 'password-updated')
                        <div class="alert alert-success" role="alert">
                            {{ __('Password updated successfully.') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('user/password') }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required autofocus>

                                @error('current_password', 'updatePassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required autofocus>

                                @error('password', 'updatePassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" name="password_confirmation" required autofocus>

                                @error('password_confirmation', 'updatePassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Profile Image') }}</div>
                <div class="card-body">
                    <div class="row justify-content-center text-center mb-3 px-5">
                        <img id="file-image" src="#" alt="Preview" class="img-thumbnail">
                    </div>
                    <div class="row justify-content-center text-center">
                          <form action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file d-none" name="avatar" id="avatarFile" aria-describedby="fileHelp" accept="image/*" onchange="readURL(this);">
                                <label for="avatarFile">Upload</label>
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    function readURL(input, id) {
     id = id || '#file-image';
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $(id).attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
  }
</script>
@endpush