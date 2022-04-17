@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Activity</li>
@endsection

@section('page-icon')
    <i class="pe-7s-graph1 icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Activity')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="mb-3 table">
                <thead>
                    <tr>
                        <th style="width: 10%">User</th>
                        <th style="width: 50%">Message</th>
                        <th style="width: 20%">Created At</th>
                        <th style="width: 20%">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->getUserName() }}</td>
                            <td>
                                {{ $activity->message }}
                                @if ($activity->label && $activity->link)
                                    <a href="{{ $activity->link }}">{{ $activity->label }}</a>
                                @endif
                            </td>
                            <td>{{ $activity->getCreatedAt() }}</td>
                            <td>{{ $activity->getUpdatedAt() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $activities->links() }}
        </div>
    </div>
@endsection
