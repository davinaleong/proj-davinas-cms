@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Posts</li>
@endsection

@section('page-title', 'Posts')

@section('page-actions')
    <div class="page-title-actions">
        <a href="add-page.html" class="btn btn-info btn-shadow">
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
                        <th>#</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Lorem Ipsum</td>
                        <td>Lorem Ipsum Title</td>
                        <td>lorem-ipsum</td>
                        <td>2022-04-15</td>
                        <td>2022-04-15</td>
                        <td>
                            <a href="add-post.html" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <nav class="pagination-rounded" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link">1</a>
                    </li>
                    <li class="page-item active">
                        <a href="javascript:void(0);" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript:void(0);" class="page-link" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
