@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="list-pages.html">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Page</li>
@endsection

@section('page-title', 'Pages')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Add Page</h5>
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
                    <label for="input-subtitle" class="form-label">Subtitle</label>
                    <textarea name="metaTitle" id="input-subtitle" class="form-control" rows="4"></textarea>
                </div>
                @include('components.errors')
                <button class="mt-1 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
