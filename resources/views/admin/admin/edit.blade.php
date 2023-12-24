<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <style>
        body {
            /* background-color: powderblue; */
            background-image: url("https://png.pngtree.com/thumb_back/fh260/background/20210205/pngtree-flat-business-login-box-login-page-image_544861.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            padding: 20px;
        }
    </style>
</head>

<body>
    <form action="" method="POST">

        @csrf
        @method('PUT')

        <div class="container">
            <div class="box">
                <div class="box-login" id="login">
                    <div class="top-header">
                        <h3>Hello</h3>
                        <small>We are happy to have you back.</small>
                    </div>
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text"  value="{{ old('name', $getRecord->name) }}" name="name" required
                                class="input-box" id="name">
                            <label for="name">Name</label>
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-field">
                            <input type="email" value="{{ old('email', $getRecord->email) }}" name="email" required
                                class="input-box" id="logEmail">

                            <label for="logEmail">Registration</label>
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-field">
                            <input type="text" name="password" class="input-box" id="logPassword">

                            <label for="logPassword">Password</label>
                            <span class="text-danger">
                            </span>
                            <div class="eye-area">
                                <div class="eye-box" onclick="myLogPassword()">

                                    <i class="fa-regular fa-eye" id="eye"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        <p>Do you want to change password Please Enter new password</p>

                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Update">
                        </div>


                    </div>
                </div>

    </form>
</body>

</html>
