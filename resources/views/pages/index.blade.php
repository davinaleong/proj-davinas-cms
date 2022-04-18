@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Pages</li>
@endsection

@section('page-icon')
    <i class="pe-7s-browser icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Pages')

@section('page-actions')
    <div class="page-title-actions">
        <a href="{{ route('pages.create') }}" class="btn btn-info btn-shadow">
            <i class="fa fa-plus"></i> Add
        </a>
    </div>
@endsection

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">List Pages</h5>
            <table class="mb-3 table">
                <thead>
                    <tr>
                        <th style="width: 20%">User</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 10%">Title</th>
                        <th style="width: 20%">Created At</th>
                        <th style="width: 20%">Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->getUserName() }}</td>
                            <td>{{ $page->name }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->getCreatedAt() }}</td>
                            <td>{{ $page->getUpdatedAt() }}</td>
                            <td>
                                <a href="{{ route('pages.show', ['page' => $page]) }}" class="btn btn-info"><i
                                        class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $pages->links() }}
        </div>
    </div>
@endsection
