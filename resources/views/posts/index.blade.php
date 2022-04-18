@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Posts</li>
@endsection

@section('page-icon')
    <i class="pe-7s-news-paper icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Post')

@section('page-actions')
    <div class="page-title-actions">
        <a href="{{ route('posts.create') }}" class="btn btn-info btn-shadow">
            <i class="fa fa-plus"></i> Add
        </a>
    </div>
@endsection

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">List Posts</h5>
            <table class="mb-3 table">
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

            {{ $posts->links() }}
        </div>
    </div>
@endsection
