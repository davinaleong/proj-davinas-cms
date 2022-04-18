@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $page->name }}</li>
@endsection

@section('page-icon')
    <i class="pe-7s-browser icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Pages')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">View Page</h5>

            <form class="">
                <div class="position-relative mb-3">
                    <label for="input-creator" class="col-sm-2 col-form-label">Creator</label>
                    <input type="text" readonly class="form-control-plaintext" id="input-creator"
                        value="{{ $page->getUserName() }}">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-name" class="col-sm-2 col-form-label">Name</label>
                    <input type="text" readonly class="form-control-plaintext" id="input-name" value="{{ $page->name }}">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-title" class="col-sm-2 col-form-label">Title</label>
                    <input type="text" readonly class="form-control-plaintext" id="input-title"
                        value="{{ $page->title }}">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-subtitle" class="col-sm-2 col-form-label">Subtitle</label>
                    <textarea name="subtitle" readonly class="form-control-plaintext" id="input-subtitle" class="form-control"
                        rows="4">{{ $page->subtitle }}</textarea>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-meta_title" class="col-sm-2 col-form-label">Meta Title</label>
                    <input type="text" readonly class="form-control-plaintext" id="input-meta_title"
                        value="{{ $page->meta_title }}">
                </div>
                <div class="position-relative mb-3">
                    <label for="input-meta_description" class="col-sm-2 col-form-label">Meta Description</label>
                    <textarea name="meta_description" readonly class="form-control-plaintext" id="input-meta_description"
                        class="form-control" rows="4">{{ $page->meta_description }}</textarea>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-created_at" class="col-sm-2 col-form-label">Created At</label>
                    <textarea name="created_at" readonly class="form-control-plaintext" id="input-created_at" class="form-control"
                        rows="4">{{ $page->getCreatedAt() }}</textarea>
                </div>
                <div class="position-relative mb-3">
                    <label for="input-updated_at" class="col-sm-2 col-form-label">Updated At</label>
                    <textarea name="updated_at" readonly class="form-control-plaintext" id="input-updated_at" class="form-control"
                        rows="4">{{ $page->getUpdatedAt() }}</textarea>
                </div>
            </form>
        </div>
    </div>
@endsection
