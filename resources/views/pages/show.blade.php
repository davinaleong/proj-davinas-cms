@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $page->name }}</li>
@endsection

@section('page-icon')
    <i class="pe-7s-browser icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Pages')

@section('page-actions')
    <div class="page-title-actions">
        <a href="{{ route('pages.edit', ['page' => $page]) }}" class="btn btn-info btn-shadow mr-2">
            <i class="fa fa-pen"></i> Edit
        </a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            <i class="fa fa-trash"></i> Delete
        </button>
    </div>
@endsection

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">View Page</h5>

            <form class="row">
                <div class="col-sm-8">
                    <div class="position-relative mb-3">
                        <label for="input-text" class="form-label">Text</label>
                        <div>{!! $page->text ? \Illuminate\Support\Str::markdown($page->text) : '' !!}</div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="position-relative mb-3">
                        <label for="input-creator" class="col-form-label">Creator</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-creator"
                            value="{{ $page->getUserName() }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-name" class="col-form-label">Name</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-name"
                            value="{{ $page->name }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-title" class="col-form-label">Title</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-title"
                            value="{{ $page->title }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-subtitle" class="col-form-label">Subtitle</label>
                        <textarea name="subtitle" readonly class="form-control-plaintext" id="input-subtitle" class="form-control"
                            rows="4">{{ $page->subtitle }}</textarea>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-meta_title" class="col-form-label">Meta Title</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-meta_title"
                            value="{{ $page->meta_title }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-meta_description" class="col-form-label">Meta Description</label>
                        <textarea name="meta_description" readonly class="form-control-plaintext" id="input-meta_description"
                            class="form-control" rows="4">{{ $page->meta_description }}</textarea>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-created_at" class="col-form-label">Created At</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-created_at"
                            value="{{ $page->getCreatedAt() }}">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="input-updated_at" class="col-form-label">Updated At</label>
                        <input type="text" readonly class="form-control-plaintext" id="input-updated_at"
                            value="{{ $page->getUpdatedAt() }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('delete-modal')
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('pages.destroy', ['page' => $page]) }}" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <p>Are you sure?<br>This action CANNOT be undone!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-ban"></i>
                        Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
@endsection
