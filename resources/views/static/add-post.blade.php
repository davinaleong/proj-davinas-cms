@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="list-posts.html">Posts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Post</li>
@endsection

@section('page-title', 'Pages')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Add Post</h5>
            <form class="">
                <div class="position-relative mb-3">
                    <label for="input-metaTitle" class="form-label">Meta Title</label>
                    <input name="metaTitle" id="input-metaTitle" type="text" class="form-control text-lowercase">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-metaDescription" class="form-label">Meta Description</label>
                    <textarea name="metaTitle" id="input-metaDescription" class="form-control" rows="2"></textarea>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-name" class="form-label">Name</label>
                    <input name="name" id="input-name" type="text" class="form-control text-lowercase">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-title" class="form-label">Title</label>
                    <input name="title" id="input-title" type="text" class="form-control text-lowercase">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-slug" class="col-sm-2 col-form-label">Slug</label>
                    <input type="text" readonly class="form-control-plaintext" id="input-slug" value="lorem-ipsum">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-summary" class="form-label">Summary</label>
                    <textarea name="summary" id="input-summary" class="form-control" rows="4"></textarea>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-text" class="form-label">Text</label>
                    <textarea name="text" id="input-text" class="form-control" rows="4"></textarea>
                </div>
                <div class="position-relative form-check">
                    <label class="form-label form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Featured
                    </label>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-datePublished" class="form-label">Date Published</label>
                    <input name="datePublished" id="input-datePublished" type="date" class="form-control text-lowercase">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-dateCreated" class="col-sm-2 col-form-label">Date Created</label>
                    <input type="text" readonly class="form-control-plaintext" id="input-dateCreated" value="lorem-ipsum">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-dateUpdated" class="col-sm-2 col-form-label">Date Updated</label>
                    <input type="text" readonly class="form-control-plaintext" id="input-dateUpdated" value="lorem-ipsum">
                </div>
                @include('components.errors')
                <button class="mt-1 btn btn-primary">Submit</button>
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
