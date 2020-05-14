@include('auth.layouts.header')
<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Register</h1>
                        <p class="signup-link register">Already have an account? <a href="{{ route('show.login') }}">Log in</a></p>
                        <form class="text-left" method="post" action="{{ route('post.register') }}">
                            @csrf
                            <div class="form">

                                <div id="name-field" class="field-wrapper input">
                                    <label for="name">NAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="name" name="name" type="text" value="" class="form-control  @error('name') is-invalid @enderror" placeholder="Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div id="email-field" class="field-wrapper input">
                                    <label for="email">EMAIL</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="text" value="" class="form-control  @error('email') is-invalid @enderror" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div id="password-field" class="field-wrapper input">
                                    <label for="password">PASSWORD</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div id="confirm-password-field" class="field-wrapper input">
                                    <label for="password">CONFIRM PASSWORD</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                                </div>

                                <div class="field-wrapper terms_condition">
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                          <input type="checkbox" class="new-control-input" required>
                                          <span class="new-control-indicator"></span><span>I agree to the <a href="javascript:void(0);">  terms and conditions </a></span>
                                        </label>
                                    </div>

                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Get Started!</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>
    @include('auth.layouts.footer')
</body>
</html>