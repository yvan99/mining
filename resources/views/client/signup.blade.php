@include('components.dashcss')

<body class="overflow-hidden">
    <main class="main-content bg-dark">
        @include('components.loader')
        <div class="admin ">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-6 col-md-6 col-sm-8">
                        <div class="mt-5">
                            <div class="card border-1">
                                <div class="card-header">
                                    <div class="edit-profile__title">
                                        <h6>Create Account {{ env('APP_NAME') }}</h6>
                                    </div>
                                </div>

                                <form method="POST" action="{{ route('client.signup') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="edit-profile__body row col-xl-12">

                                            <div class="form-group mb-25 col-xl-6">
                                                <label for="username">Full Names</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}"
                                                    placeholder="Ex:John Doe">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group mb-25 col-xl-6">
                                                <label for="username">Email Address</label>
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}"
                                                    placeholder="Valid Email Address">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-25 col-xl-6">
                                                <label for="username">Telephone Number</label>
                                                <input type="text"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    name="phone" value="{{ old('phone') }}"
                                                    placeholder="Ex:Valid Phone Number">

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group mb-25 col-xl-6">
                                                <label for="username">Residence Address</label>
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" value="{{ old('address') }}"
                                                    placeholder="Ex:Enter your address">

                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-15">
                                                <label for="password-field">Password</label>
                                                <div class="position-relative">
                                                    <input id="password-field" type="password" name="password"
                                                        class="form-control" name="password" placeholder="*****">
                                                    <div
                                                        class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- <div class="admin-condition">
                                            <div class="checkbox-theme-default custom-checkbox ">
                                                <input class="checkbox" type="checkbox" id="check-1">
                                                <label for="check-1">
                                                    <span class="checkbox-text">Keep me logged in</span>
                                                </label>
                                            </div>
                                        </div> --}}
                                            <div
                                                class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                <button type="submit"
                                                    class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                    Create Account
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="admin-topbar">
                                    <p class="mb-0">
                                        Already Have An Account?
                                        <a href="/client/login" class="color-primary">
                                            Login
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('components.dashjs')
