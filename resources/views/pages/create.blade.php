@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Page</li>
@endsection

@section('page-icon')
    <i class="pe-7s-browser icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Pages')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Add Page</h5>

            <form id="form" class="row" method="POST" action="{{ route('pages.store') }}">
                <div class="col-sm-12">
                    <div class="position-relative mb-3">
                        <label for="input-text" class="form-label">Text</label>
                        <input type="hidden" name="text" id="input-text">
                        <div id="editor">{{ old('text') }}</div>
                    </div>
                </div>

                <div class="col-sm-12">
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
            initialValue: `{{ old('text') }}`
        });

        editor.getMarkdown();

        document.querySelector('#form').addEventListener('submit', e => {
            e.preventDefault();
            document.querySelector('#input-text').value = editor.getMarkdown();
            e.target.submit();
        });
    </script>
@endsection
