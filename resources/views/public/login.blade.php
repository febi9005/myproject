@extends('template.layouts')
@section('title', 'Login - Toko Thrift ')
@section('main')

    <body>
        <!----------------------- Main Container -------------------------->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <!----------------------- Login Container -------------------------->
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <!--------------------------- Left Box ----------------------------->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                    style="background: #9AC8CD;">
                    <div class="featured-image mb-3">
                        <img src="assets/img/1.png" class="img-fluid" style="width: 250px;">
                    </div>
                    <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be
                        Verified</p>
                    <small class="text-white text-wrap text-center"
                        style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on
                        this platform.</small>
                </div>
                <!-------------------- ------ Right Box ---------------------------->

                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Hello,Again</h2>
                            <p>We are happy to have you back.</p>
                        </div>
                        <form class="row g-3 needs-validation" action="{{ route('user.login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="username" name="username" id="username" class="form-control"
                                    placeholder="Masukkan username Anda" style="width: 200px" required />
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group mb-1">
                                <input type="password" name="password" id="password"
                                    class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group mb-5 d-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="formCheck">
                                    <label for="formCheck" class="form-check-label text-secondary"><small>Remember
                                            Me</small></label>
                                </div>
                                <div class="forgot">
                                    <small><a href="#">Forgot Password?</a></small>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <a href="Home" style="heigth:100px;"><button
                                        class="btn btn-lg btn-primary w-100 fs-6">Login</button></a>
                            </div>
                            <div class="row d-flex" style="margin-left: 5px">
                                <span>Don't have account? <a href="register">Sign Up</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
     