@extends('layouts.auth')

@section('content')
    <div class="h-100 bg-plum-plate bg-animation">
        <div class="d-flex h-100 justify-content-center align-items-center">
            <div class="mx-auto app-login-box col-md-8">
                <div class="app-logo-inverse mx-auto mb-3"></div>
                <div class="modal-dialog w-100 mx-auto">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="h5 modal-title text-center">
                                <h4 class="mt-2">
                                    <div>Welcome back,</div>
                                    <span>Please sign in to your account below.</span>
                                </h4>
                            </div>
                            @include('components.alert-message')
                            @include('components.alert-error')
                            <form class="">
                                <div class="">
                                    <div class="col-md-12">
                                        <div class="position-relative mb-3">
                                            <input name="email" id="exampleEmail" placeholder="Email here..." type="email"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative mb-3">
                                            <input name="password" id="examplePassword" placeholder="Password here..."
                                                type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                @include('components.errors')
                                <div class="position-relative form-check mb-3">
                                    <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                    <label for="exampleCheck" class="form-label form-check-label">Keep me logged
                                        in</label>
                                </div>
                            </form>
                            <div class="divider"></div>
                            <h6 class="mb-0">No account?
                                <a href="javascript:void(0);" class="text-primary">Sign up now</a>
                            </h6>
                        </div>
                        <div class="modal-footer clearfix">
                            <div class="float-start">
                                <a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                            </div>
                            <div class="float-end">
                                <!-- <button class="btn btn-primary btn-lg">Login to Dashboard</button> -->
                                <a href="index.html" class="btn btn-primary btn-lg">Login to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center text-white opacity-8 mt-3">Copyright © ArchitectUI 2019</div>
            </div>
        </div>
    </div>
@endsection
