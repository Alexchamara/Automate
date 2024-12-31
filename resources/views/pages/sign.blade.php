@extends('layouts.app')
@section('pages')
    <div class="sign-containe">
        <section id="formHolder">
            <div class="row">
                <!-- Brand Box -->
                <div class="col-sm-6 brand">
                    <!-- <a href="#" class="logo">Register <span>.</span></a> -->

                    <div class="heading">
                        <h1>Register</h1>
                        <p>Create your account now and receive all the benefits.</p>
                    </div>

                    <div class="sign-page-lable">
                        <label><i class="fa-solid fa-car" style="color: #ffffff;"></i> Create Advertises</label>
                        <label><i class="fa-regular fa-heart" style="color: #ffffff;"></i></i> Shortlist vehicles</label>
                        <label><i class="fa-regular fa-message" style="color: #ffffff;"></i> Connect with buyers &
                            sellers</label>
                        <label><i class="fa-regular fa-paper-plane" style="color: #ffffff;"></i> Receive industry
                            news</label>
                    </div>
                    <div class="new-mem">
                        <a href="#" class="switch">Register now - it's free</a>
                    </div>
                </div>

                <!-- Form Box -->
                <div class="col-sm-6 form">
                    <!-- Login Form -->
                    <div class="login form-peice switched">
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form class="login-form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <h2>Log in</h2>
                            <div class="form-group">
                                <label for="loginemail">Email Adderss</label><br>
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label for="loginPassword">Password</label><br>
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="CTA">
                                <button type="submit" name="submit">login</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Login Form -->

                    <!-- Signup Form -->
                    <div class="signup form-peice">
                        <form class="signup-form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <h2>Sign in</h2>
                            <div class="form-group">
                                <label for="name">Full Name</label><br>
                                {{-- <input type="text" name="uName" id="name" class="name"> --}}
                                <x-text-input id="name" type="text" name="name" :value="old('name')" required
                                    autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label for="email">Email Adderss</label><br>
                                {{-- <input type="email" name="uEmail" id="email" class="email"> --}}
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label><br>
                                {{-- <input type="password" name="uPassword" id="password" class="pass"> --}}
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label for="pwdrepeat">Confirm password</label><br>
                                {{-- <input type="password" name="uPwdRepeat" id="pwdrepeat" class="pass"> --}}
                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="CTA">
                                <!-- <input type="submit" name="submit " value="Signup Now"> -->
                                <button type="submit" class="submit">sign in</button>
                                <a href="#" class="switch">I have an account</a>
                            </div>
                        </form>
                    </div><!-- End Signup Form -->
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".switch").click(function() {
                $(".form-peice").toggleClass("switched");
            });
        });
    </script>
@endsection
