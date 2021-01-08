@extends('layouts.app')

@section('title', 'User')

@section('content')
    <x-page-title>{{ __('User') }}</x-page-title>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit User') }}
                </div>
                <div class="card-body">
                    <form action="{{ route("users.update", $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}*</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}*</label>
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" @if($user->email_verified_at) readonly="readonly" @endif>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="roles">{{ __('Roles') }}*</label>
                        <select name="roles" id="roles" class="form-control @error('roles') is-invalid @enderror">
                            <option selected disabled value="">Choose...</option>
                            @foreach($roles as $id => $roles)
                            <option value="{{ $id }}" {{ in_array($id, old('roles', $user_roles)) ? 'selected' : '' }}>{{ $roles }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" value="{{ __('Save') }}">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection