@include('bootstrap')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <title>Teacher student List</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        
            background-image: url("https://img.freepik.com/free-photo/vibrant-colors-autumn-leaves-wood-plank-generated-by-ai_188544-9873.jpg?size=626&ext=jpg&uid=R83468010&ga=GA1.1.1959353405.1689393240&semt=ais");
          
           
        }
    </style>
</head>

<body>

    {{-- <div class="container">
       
        <h3 style="color: white">Search Students</h3>
        <main>
            <form action="" method="get">

                <div class="d-flex rounded-4 container">

                    <input type="text" name="name" class="form-control" placeholder="Search by Name"
                        value="{{ Request::get('name') }}">
                    <input type="text" name="email" class="form-control" placeholder="Search by Registration"
                        value="{{ Request::get('email') }}">
                    <button class="btn btn-warning" type="submit">Search</button>
                    <a href="{{ url('admin/teacher/my-student/' . $teacher_id) }}" class="btn btn-success">Reset</a>
                </div>
            </form>
        </main>
    </div> --}}
<h3 style="color: white; text-align:center" class="mt-5">
    Teacher Name ({{$getTeacher->name}})
</h3>
<div style="display: flex; justify-content:center; align-item:center;gap:20px">
    <a href="{{url('admin/dashboard')}}" class="btn btn-warning mt-3"> Admin Dashboard</a>
    <a href="{{url('admin/teacher/list')}}" class="btn btn-warning mt-3">Teachers List</a>
</div>



   
    <h3 style="color: white; text-align:center;margin-top:20px;">Students  List</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Registration</th>
                   <th>Class</th>
                   <th>Teacher Name</th>
                    <th>Assign Teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getRecord as $value)
                                <tr>
                                    <td>
                                        {{ $value->id }}</td>

                                    <td>{{ $value->name }}</td>

                                    <td>{{ $value->email }}</td>
                        
                                    <td>{{ $value->class_id }}</td>
                                    <td>{{ $value->teacher_name }}</td>
                                   
                                    <td>
                                        <a href="{{ url('admin/teacher/assign_student_teacher/' . $value->id.'/'.$teacher_id) }}"
                                            class="btn btn-success">Assign Teacher</a>
                                    </td>
                            
                                </tr>
                            @endforeach
                

            </tbody>
           
        </table>
    </div>
   
    <h3 style="color: white; text-align:center;">Student Teacher List</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Registration</th>
                   <th>Class</th>
                   <th>Teacher Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getMyRecord as $value)
                                <tr>
                                    <td>
                                        {{ $value->id }}</td>

                                    <td>{{ $value->name }}</td>

                                    <td>{{ $value->email }}</td>
                        
                                    <td>{{ $value->class_id }}</td>
                                    <td>{{ $value->teacher_name }}</td>
                                   
                                    <td>
                                        <a href="{{ url('admin/teacher/assign_student_teacher_delete/' . $value->id) }}"
                                            class="btn btn-danger"> Delete</a>
                                    </td>
                            
                                </tr>
                            @endforeach
                

            </tbody>
           
        </table>
    </div>
   













          


   
</body>

</html>
