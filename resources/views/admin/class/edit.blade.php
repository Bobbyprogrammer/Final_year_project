
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit class</title>
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
                        <h3>Update</h3>
                        <small>Do you Really want to Update?</small>
                    </div>
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text" value="{{$getRecord->name}}" name="name" class="input-box"
                                id="name">

                            <label for="name">Class Name</label>
                            <span class="text-danger">
                              
                            </span>
                        </div>

                        <div class="input-field">
                            <select  style="width: 100%;
                            padding: 12px 20px;
                            margin: 8px 0;
                            box-sizing: border-box; border-radius: 15px;"  class="form-control" name="status">
 <option {{($getRecord->status==0) ? 'selected' : ''}} value="0">Active<option>
 <option {{($getRecord->status==1) ? 'selected' : ''}} value="1">InActive</option>
                            </select>

            
            
                        </div>


                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Update">
                        </div>


                    </div>
                </div>

    </form>
</body>

</html>
