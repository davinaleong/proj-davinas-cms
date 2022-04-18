@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Search</li>
@endsection

@section('page-icon')
    <i class="pe-7s-search icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Search')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">List Pages</h5>
            <table id="pagesTable" class="mb-3 table">
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

            <h5 class="card-title">List Posts</h5>
            <table id="postsTable" class="mb-3 table">
                <thead>
                    <tr>
                        <th style="width: 10%">User</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 20%">Title</th>
                        <th style="width: 20%">Slug</th>
                        <th style="width: 10%">Published At</th>
                        <th style="width: 10%">Created At</th>
                        <th style="width: 10%">Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->getUserName() }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->getPublishedAt() }}</td>
                            <td>{{ $post->getCreatedAt() }}</td>
                            <td>{{ $post->getUpdatedAt() }}</td>
                            <td>
                                <a href="{{ route('posts.show', ['post' => $post]) }}" class="btn btn-info"><i
                                        class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
