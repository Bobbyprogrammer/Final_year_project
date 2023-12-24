<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <style>
        body {
            /* background-color: powderblue; */
            background-image: url("https://png.pngtree.com/thumb_back/fh260/background/20210205/pngtree-flat-business-login-box-login-page-image_544861.jpg");
        }
    </style>
</head>

<body>
    {{-- 
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
        @endforeach
    @endif

    @if (Session::has('error'))
        <p style="color:red;">{{ Session::get('error') }}</p>
    @endif --}}

    <form action="" method="POST">
        @csrf

        <div class="container">
            <div class="box">
                <div class="box-login" id="login">
                    <div class="top-header">
                        <h3>Reset! Password</h3>

                    </div>
                    <div class="input-group">
                        <div class="input-field">
                            <input type="password" name="password" class="input-box" id="Password">

                            <label for="password">Password</label>
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="input-field">
                            <input type="password" name="confirm_password" class="input-box" id="Password">

                            <label for="password">Confirm Password</label>
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Reset Password">
                        </div>
                        <div class="input-field">

                            <input type="submit" class="input-submit" value="Login">
                        </div>


                    </div>
                </div>

    </form>
</body>

</html>
