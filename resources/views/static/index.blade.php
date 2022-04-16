@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Activity</li>
@endsection

@section('page-title', 'Activity')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="mb-0 table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lorem Ipsum</td>
                        <td>2022-04-15</td>
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
