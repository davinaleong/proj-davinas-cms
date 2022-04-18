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

            <form class="" method="POST" action="{{ route('pages.store') }}">
                @csrf
                <div class="position-relative mb-3">
                    <label for="input-name" class="form-label">Name</label>
                    <input name="name" id="input-name" type="text" class="form-control text-lowercase"
                        value="{{ old('name') }}" required>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-title" class="form-label">Title</label>
                    <input name="title" id="input-title" type="text" class="form-control text-lowercase"
                        value="{{ old('title') }}" required>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-subtitle" class="form-label">Subtitle</label>
                    <textarea name="metaTitle" id="input-subtitle" class="form-control" rows="4"
                        required>{{ old('subtitle') }}</textarea>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-meta_title" class="form-label">Meta Title</label>
                    <input name="meta_title" id="input-meta_title" type="text" class="form-control text-lowercase"
                        value="{{ old('meta_title') }}" required>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-meta_description" class="form-label">Meta Description</label>
                    <textarea name="meta_title" id="input-meta_description" class="form-control" rows="2"
                        required>{{ old('meta_descriotion') }}</textarea>
                </div>

                @include('components.errors')

                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
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
