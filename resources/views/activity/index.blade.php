@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Activity</li>
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

            <nav class="pagination-rounded" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link">1</a>
                    </li>
                    <li class="page-item active">
                        <a href="javascript:void(0);" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
