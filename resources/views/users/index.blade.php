@extends('layouts.app')

@section('title', 'User')

@section('content')
    <x-page-title>{{ __('User') }}</x-page-title>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Manage Users') }}
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