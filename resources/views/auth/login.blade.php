@extends('layouts.auth')

@section('content')
    <div class="h-100 bg-plum-plate bg-animation">
        <div class="d-flex h-100 justify-content-center align-items-center">
            <div class="mx-auto app-login-box col-md-8">
                <div class="app-logo-inverse mx-auto mb-3"></div>
                <div class="modal-dialog w-100 mx-auto">
                    <form method="POST" action="{{ route('login') }}" class="modal-content">
                        <div class="modal-body">
                            <div class="h5 modal-title text-center">
                                <h4 class="mt-2">
                                    <div>Welcome back,</div>
                                    <span>Please sign in to your account below.</span>
                                </h4>
                            </div>
                            @include('components.alert-message')
                            @include('components.alert-error')
                            @csrf
                            <div class="">
                                <div class="col-md-12">
                                    <div class="position-relative mb-3">
                                        <input name="email" id="input-email" placeholder="Email" type="email"
                                            class="form-control" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="position-relative mb-3">
                                        <input name="password" id="input-password" placeholder="Password" type="password"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            @include('components.errors')
                            <div class="position-relative form-check mb-3">
                                <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                <label for="exampleCheck" class="form-label form-check-label">Keep me logged
                                    in</label>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-lg">Login to Dashboard</button>
                        </div>
                    </form>
                </div>
                <div class="text-center text-white opacity-8 mt-3">
                    <em>{{ env('APP_NAME', 'Davina\'s CMS') }} &copy; {{ env('APP_AUTHOR', 'Davina\'s CMS') }},
                        {{ now()->format('Y') > 2022 ? '2022 - ' . now()->format('Y') : now()->format('Y') }}</em>
                </div>
            </div>
        </div>
    </div>
@endsection
