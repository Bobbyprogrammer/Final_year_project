<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
   
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">

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
                        <h3>Forgot! Password</h3>
                        <small>Reset your password</small>
                    </div>
                    <div class="input-group">
                        <div class="input-field">
                            <input type="email" value="{{ old('email') }}" name="email" class="input-box"
                                id="logEmail">

                            <label for="logEmail">Registration</label>
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        
                       
                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Forgot">
                        </div>
                        <div class="input-field">
                            
                          <a href="{{url('login')}}">Go to Login</a>
                        </div>
                       

                    </div>
                </div>

    </form>
</body>

</html>
