@extends('layouts.app')

@section('title', 'Permission')

@section('content')
    <x-page-title>{{ __('Permission') }}</x-page-title>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Permission') }}
                </div>
                <div class="card-body">
                    <form action="{{ route("permissions.update", $permission->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}*</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $permission->name) }}">
                        @error('name')
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