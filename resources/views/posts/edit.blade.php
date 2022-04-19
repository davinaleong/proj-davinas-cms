@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
    <li class="breadcrumb-item"><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
@endsection

@section('page-icon')
    <i class="pe-7s-news-paper icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Posts')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Edit Post</h5>

            <form id="form" class="row" method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
                <div class="col-sm-12">
                    <div class="position-relative mb-3">
                        <label for="input-text" class="form-label">Text</label>
                        <input type="hidden" name="text" id="input-text">
                        <div id="editor"></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="position-relative mb-3">
                        <label for="input-creator" class="col-form-label">Creator</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-creator"
                            value="{{ $post->getUserName() }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-name" class="form-label">Name</label>
                        <input name="name" id="input-name" type="text" class="form-control"
                            value="{{ old('name') ? old('name') : $post->name }}" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-slug" class="col-form-label">Slug</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-slug"
                            value="{{ $post->slug }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-title" class="form-label">Title</label>
                        <input name="title" id="input-title" type="text" class="form-control"
                            value="{{ old('title') ? old('title') : $post->title }}" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-subtitle" class="form-label">Subtitle</label>
                        <textarea name="subtitle" id="input-subtitle" class="form-control"
                            rows="4">{{ old('subtitle') ? old('subtitle') : $post->subtitle }}</textarea>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-summary" class="col-form-label">Summary</label>
                        <textarea name="summary" readonly class="form-control-plaintext" id="input-summary" class="form-control"
                            rows="4">{{ $post->summary }}</textarea>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-meta_title" class="form-label">Meta Title</label>
                        <input name="meta_title" id="input-meta_title" type="text" class="form-control"
                            value="{{ old('meta_title') ? old('meta_title') : $post->meta_title }}" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-meta_description" class="form-label">Meta Description</label>
                        <textarea name="meta_description" id="input-meta_description" class="form-control"
                            rows="2">{{ old('meta_description') ? old('meta_description') : $post->meta_description }}</textarea>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-published_at" class="form-label">Published At</label>
                        <input name="published_at" id="input-published_at" type="date" class="form-control"
                            value="{{ old('published_at') ? old('published_at') : $post->published_at }}" required>
                    </div>
                    <div class="position-relative form-check">
                        <label class="form-check-label">
                            <input type="checkbox" id="input-featured" class="form-check-input" value="1"
                                {{ $post->featured ? 'checked' : '' }}> Featured
                        </label>
                    </div>

                    <div class="position-relative mb-3">
                        <label for="input-created_at" class="col-form-label">Created At</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-created_at"
                            value="{{ $post->getCreatedAt() }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-updated_at" class="col-form-label">Updated At</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-updated_at"
                            value="{{ $post->getUpdatedAt() }}">
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

@section('styles')
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
@endsection

@section('scripts')
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
    <script>
        const editor = new toastui.Editor({
            el: document.querySelector('#editor'),
            height: '500px',
            initialEditType: 'markdown',
            previewStyle: 'vertical',
            initialValue: `{{ old('text') ? old('text') : $post->text }}`
        });

        editor.getMarkdown();

        document.querySelector('#form').addEventListener('submit', e => {
            e.preventDefault();
            document.querySelector('#input-text').value = editor.getMarkdown();
            e.target.submit();
        });
    </script>
@endsection
