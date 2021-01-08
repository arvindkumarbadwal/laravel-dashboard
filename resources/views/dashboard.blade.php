@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<x-page-title>{{ __('Dashboard') }}</x-page-title>
<div class="row">
    @can('users_manage')
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">{{ __('Users') }}</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title text-muted">3</h1>
            </div>
        </div>
    </div>
    @endcan

    @can('roles_manage')
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">{{ __('Roles') }}</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title text-muted">3</h1>
            </div>
        </div>
    </div>
    @endcan

    @can('permissions_manage')
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">{{ __('Permissions') }}</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title text-muted">3</h1>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection