<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <style>
        body {
            /* background-color: powderblue; */
            background-image: url("https://png.pngtree.com/thumb_back/fh260/background/20210205/pngtree-flat-business-login-box-login-page-image_544861.jpg");
        }
        </style>
</head>

<body >


    <form action="{{url('login')}}" method="POST">
        @csrf

        
        <div class="container">
            <div class="box">
            <div class="box-login" id="login">
                <div class="top-header">
                    <h3>Hello, Again!</h3>
                    <small>We are happy to have you back.</small>
                </div>
                <div class="input-group">
                     <div class="input-field">
                        <input type="email" value="{{old('email')}}" name="email" class="input-box" id="logEmail">
                     
                        <label for="logEmail">Registration</label>
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                           </span>
                     </div>
                     <div class="input-field">
                        <input type="password" name="password" class="input-box" id="logPassword">
                        
                        <label for="logPassword">Password</label>
                        <span class="text-danger">
                            @error('password')
                                {{$message}}
                            @enderror
                           </span>
                        <div class="eye-area">
                         <div  class="eye-box" onclick="myLogPassword()">
                          <i class="fa-regular fa-eye" id="eye"></i>
                          <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                       </div>
                     </div>
                     </div>
                     <div class="remember">
                        <input type="checkbox" name="remember" id="formCheck" class="check">
                        <label for="formCheck">Remember Me</label>
                     </div>
                     <div class="input-field">
                        <input type="submit" class="input-submit" value="Sign In" >
                     </div>
                     <div class="forgot">
                        <a href="{{url('forgot/password')}}">Forgot password?</a>
                     </div>
                    
                </div>
             </div>

    </form>
</body>
</html>

   
