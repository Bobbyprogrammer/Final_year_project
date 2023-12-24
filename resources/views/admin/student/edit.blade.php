<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
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
        @method('PUT')
        <div class="container">
            <div class="box">
                <div class="box-login" id="login">
                    <div class="top-header">
                        <h3>Update Student</h3>
                        <small>We are happy to have you back.</small>
                    </div>
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text" value="{{ old('name',$getRecord->name) }}" name="name" required class="input-box"
                                id="name">

                            <label for="name">Name</label>
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-field">
                            <input type="email" value="{{ old('email',$getRecord->email) }}" name="email" required class="input-box"
                                id="logEmail">

                            <label for="logEmail">Registration</label>
                            <span style="color: red">
                                {{ $errors->first('email') }}
                            </span>
                        </div>

                        <div class="input-field">

                            <select
                                style="width: 100%;
                        padding: 12px 20px;
                        margin: 8px 0;
                        box-sizing: border-box; border-radius: 15px;"
                                class="form-control" name="class_id" required>
                                <option value="{{ old('class_id',$getRecord->class_id) }}">Select Class</option>
                                @foreach ($getClass as $value)
                                    <option {{(old('class_id',$getRecord->class_id)==$value->name)? 'selected' :'' }} value="{{ $value->name }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">

                            <select
                                style="width: 100%;
                        padding: 12px 20px;
                        margin: 8px 0;
                
                        box-sizing: border-box; border-radius: 15px;"
                                class="form-control" name="status" value={{ old('status',$getRecord->status) }} required>
                                <option value="">Select Status</option>
                                <option {{ (old('status',$getRecord->status)==0)? 'selected' :''}} value="0">Active</option>
                                <option {{ (old('status',$getRecord->status)==1)? 'selected' :''}} value="1">InActive</option>

                            </select>
                        </div>

                        <div class="input-field">
                            <input type="password" name="password" class="input-box" id="logPassword">

                            <label for="logPassword">Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="myLogPassword()">
                                    <i class="fa-regular fa-eye" id="eye"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                                </div>
                            </div>
                        </div>

                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Update Student">
                        </div>


                    </div>
                </div>

    </form>
</body>

</html>
