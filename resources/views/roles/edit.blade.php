@extends('layouts.app')

@section('title', 'Role')

@section('content')
    <x-page-title>{{ __('Role') }}</x-page-title>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Role') }}
                </div>
                <div class="card-body">
                    <form action="{{ route("roles.update", $role->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}*</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $role->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('permission') has-error @enderror">
                        <label for="permission">{{ __('Permissions') }}*</label>
                        <div class="row @error('permission') is-invalid @enderror">
                            @foreach($permissions as $id => $permission)
                                <div class="col-sm-3">
                                    <input type="checkbox" id="permission-{{$id}}" name="permission[]" value="{{ $id }}" {{ in_array($id, old('permission', $role_permissions)) ? 'checked' : '' }}>
                                    <label for="permission-{{$id}}">
                                        {{ $permission }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('permission')
                            <div class="invalid-feedback"> {{ $message }} </div>
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