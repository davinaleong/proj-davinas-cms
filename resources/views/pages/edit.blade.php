@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Pages</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pages.show', ['page' => $page]) }}">{{ $page->name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
@endsection

@section('page-icon')
    <i class="pe-7s-browser icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Pages')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Edit Page</h5>

            <form class="row" method="POST" action="{{ route('pages.update', ['page' => $page]) }}">
                <div class="col-sm-8">
                    <div class="position-relative mb-3">
                        <label for="input-text" class="form-label">Text</label>
                        <textarea name="text" id="input-text" class="form-control"
                            rows="4">{{ old('text') ? old('text') : $page->text }}</textarea>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="position-relative mb-3">
                        <label for="input-creator" class="col-sm-2 col-form-label">Creator</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-creator"
                            value="{{ $page->getUserName() }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-name" class="form-label">Name</label>
                        <input name="name" id="input-name" type="text" class="form-control"
                            value="{{ old('name') ? old('name') : $page->name }}" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-title" class="form-label">Title</label>
                        <input name="title" id="input-title" type="text" class="form-control"
                            value="{{ old('title') ? old('title') : $page->title }}" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-subtitle" class="form-label">Subtitle</label>
                        <textarea name="subtitle" id="input-subtitle" class="form-control" rows="4"
                            required>{{ old('subtitle') ? old('subtitle') : $page->subtitle }}</textarea>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-meta_title" class="form-label">Meta Title</label>
                        <input name="meta_title" id="input-meta_title" type="text" class="form-control"
                            value="{{ old('meta_title') ? old('meta_title') : $page->meta_title }}" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-meta_description" class="form-label">Meta Description</label>
                        <textarea name="meta_description" id="input-meta_description" class="form-control" rows="2"
                            required>{{ old('meta_description') ? old('meta_description') : $page->meta_description }}</textarea>
                    </div>

                    <div class="position-relative mb-3">
                        <label for="input-created_at" class="col-sm-2 col-form-label">Created At</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-created_at"
                            value="{{ $page->getCreatedAt() }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-updated_at" class="col-sm-2 col-form-label">Updated At</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-updated_at"
                            value="{{ $page->getUpdatedAt() }}">
                    </div>
                </div>

                <div class="col-sm-12">
                    @csrf
                    @method('PATCH')
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
