@extends('layouts.app')

@section('content')

<style>
    @media (max-width: 600px) {
            .m-account--content-w {
                height: 300px
            }
        }
</style>

<div class="m-account-w" data-bg-img="assets/img/account/wrapper-bg.jpg">
    <div class="m-account">
        <div class="row no-gutters">
            <div class="col-md-6">
                <!-- Login Content Start -->
                <div class="m-account--content-w" data-bg-img="{{ asset('dashboard_asset/img/account/content-bg.jpg') }}">
                    <!-- <div class="m-account--content">
                        <h2 class="h2">Don't have an account?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="register.html" class="btn btn-rounded">Register Now</a>
                    </div> -->
                </div>
                <!-- Login Content End -->
            </div>

            <div class="col-md-6">
                <!-- Login Form Start -->
                <div class="m-account--form-w">
                    <div class="m-account--form">
                        <!-- Logo Start -->
                        <div class="logo">
                            <img src="assets/img/logo.png" alt="">
                        </div>
                        <!-- Logo End -->

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label class="m-account--title">Login to your account</label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <i class="fas fa-user"></i>
                                    </div>

                                    <input type="email" name="email" placeholder="Email" class="form-control" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <i class="fas fa-key"></i>
                                    </div>

                                    <input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="m-account--actions">
                                <a href="#" class="btn-link">Forgot Password?</a>

                                <button type="submit" class="btn btn-rounded btn-info">Login</button>
                            </div>

                            <!-- <div class="m-account--alt">
                                <p><span>OR LOGIN WITH</span></p>

                                <div class="btn-list">
                                    <a href="#" class="btn btn-rounded btn-warning">Facebook</a>
                                    <a href="#" class="btn btn-rounded btn-warning">Google</a>
                                </div>
                            </div> -->

                            <!-- <div class="m-account--footer">
                                <p>&copy; 2018 ThemeLooks</p>
                            </div> -->
                        </form>
                    </div>
                </div>
                <!-- Login Form End -->
            </div>
        </div>
    </div>
</div>

@endsection
