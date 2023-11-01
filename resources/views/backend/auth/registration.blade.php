
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Registation</title>
        <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="{{ route('store') }}" method="POST">
                                            @csrf
                                        
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Enter your name" required value="{{ old('name') }}">
                                                <label for="name">Your Name:</label>
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
                                                <label for="email">Email address</label>
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Create a password" required value="{{ old('password') }}">
                                                        <label for="password">Password</label>
                                                        @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password" required>
                                                        <label for="password_confirmation">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" value="Create an Account"></div>
                                            </div>
                                        </form>
                                        
                                        
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/js/scripts.js') }}"></script>
    </body>
</html>
