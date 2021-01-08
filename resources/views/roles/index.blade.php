@extends('layouts.app')

@section('title', 'Role')

@section('content')
    <x-page-title>{{ __('Role') }}</x-page-title>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Manage Roles') }}
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush