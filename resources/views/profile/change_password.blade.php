
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin Change Password</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <style>
        body {
            /* background-color: powderblue; */
            background-image: url("https://png.pngtree.com/thumb_back/fh260/background/20210205/pngtree-flat-business-login-box-login-page-image_544861.jpg");
        }
    </style>
</head>

<body>


    <form action="" method="POST">
        @csrf
        <div class="container">
            <div class="box">
                <div class="box-login" id="login">
                    <div class="top-header">
                        <h3>Hello</h3>
                        <small>Change your password</small>
                    </div>
                    <div class="input-group">
                        <div class="input-field">
                            <input type="password"  required value="" name="old_password" required class="input-box"
                                id="password">

                            <label for="password">Old Password</label>
                        </div>
                        <div class="input-field">
                            <input type="password" required value="" name="new_password" required class="input-box"
                                id="password">

                            <label for="password">New Password</label>
                        </div>

                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Change Password">
                        </div>

                        <section class="table__body">
                            @if (session()->has('status'))
                            <div style="color: red">
                                {{ session('status') }}
                            </div>
                            @endif
                        </section>

                    </div>
                    <a href="{{url('admin/dashboard')}}">Go to Admin Dashboard</a>
                </div>

    </form>
    
    
</body>

</html>
