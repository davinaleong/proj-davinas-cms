@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Post</li>
@endsection

@section('page-icon')
    <i class="pe-7s-news-paper icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Posts')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Add Post</h5>

            <form class="row" method="POST" action="{{ route('posts.store') }}">
                <div class="col-sm-8">
                    <div class="position-relative mb-3">
                        <label for="input-text" class="form-label">Text</label>
                        <textarea name="text" id="input-text" class="form-control" rows="4">{{ old('text') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="position-relative mb-3">
                        <label for="input-name" class="form-label">Name</label>
                        <input name="name" id="input-name" type="text" class="form-control" value="{{ old('name') }}"
                            required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-title" class="form-label">Title</label>
                        <input name="title" id="input-title" type="text" class="form-control" value="{{ old('title') }}"
                            required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-subtitle" class="form-label">Subtitle</label>
                        <textarea name="subtitle" id="input-subtitle" class="form-control" rows="4">{{ old('subtitle') }}</textarea>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-meta_title" class="form-label">Meta Title</label>
                        <input name="meta_title" id="input-meta_title" type="text" class="form-control"
                            value="{{ old('meta_title') }}" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-meta_description" class="form-label">Meta Description</label>
                        <textarea name="meta_description" id="input-meta_description" class="form-control"
                            rows="2">{{ old('meta_description') }}</textarea>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-published_at" class="form-label">Published At</label>
                        <input name="published_at" id="input-published_at" type="date" class="form-control"
                            value="{{ old('published_at') }}" required>
                    </div>
                    <div class="position-relative form-check">
                        <label class="form-check-label">
                            <input type="checkbox" id="input-featured" class="form-check-input" value="1"> Featured
                        </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    @csrf
                    @include('components.errors')

                    <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector("#input-text"))
            .catch(error => console.error("CKEditor Error: ", error))
    </script>
@endsection
