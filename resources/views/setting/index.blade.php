@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Settings</li>
@endsection

@section('page-icon')
    <i class="pe-7s-settings icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Settings')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="mb-3 table">
                <thead>
                    <tr>
                        <th style="width: 20%">User</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 10%">Key</th>
                        <th style="width: 10%">Value</th>
                        <th style="width: 20%">Created At</th>
                        <th style="width: 20%">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $setting)
                        <tr>
                            <td>{{ $setting->getUserName() }}</td>
                            <td>{{ $setting->name }}</td>
                            <td>{{ $setting->key }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>{{ $setting->getCreatedAt() }}</td>
                            <td>{{ $setting->getUpdatedAt() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $settings->links() }}
        </div>
    </div>
@endsection
