@include('bootstrap')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
    <title>Student List</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: url({{ asset('assets/images/html_table.jpg') }}) center / cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        td {
            font-size: 18px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">

                    <h2>Ad<span class="danger">mins</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{ url('admin/dashboard') }}">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Admin</h3>
                </a>
                <a href="{{ url('/') }}">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <form action="" method="get">

                <div class="d-flex rounded-4 container">

                    <input type="text" name="name" class="form-control" placeholder="Search by Name"
                        value="{{ Request::get('name') }}">
                    <input type="text" name="email" class="form-control" placeholder="Search by Registration"
                        value="{{ Request::get('email') }}">
                    <button class="btn btn-warning" type="submit">Search</button>
                    <a href="{{ url('admin/student/list') }}" class="btn btn-success">Reset</a>
                </div>
            </form>

            <main class="table">
                <section class="table__header">
                    <h1>Students List </h1>
                  <a class="btn btn-primary" href="{{url('admin/student/add')}}">Add Student</a>
                  <a class="btn btn-primary" href="#">Import From Excel</a>
                </section>

                <section class="table__body">
                      @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table>
                        <thead>
                            <tr>
                                <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Name <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Registration <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Teacher <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Class <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Status <span class="icon-arrow">&UpArrow;</span></th>

                                <th> Edit <span class="icon-arrow">&UpArrow;</span></th>
                                <th> Delete <span class="icon-arrow">&UpArrow;</span></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($getRecord as $value)
                                <tr>
                                    <td>
                                        {{ $value->id }}</td>

                                    <td>{{ $value->name }}</td>

                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->teacher_name }}</td>
                                    <td>{{ $value->class_id }}</td>
                                    <td>{{ $value->status ==0 ? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <a href="{{ url('admin/student/edit/' . $value->id) }}"
                                            class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/student/delete/' . $value->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </section>
            </main>

            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>



            </div>
            <!-- End of Nav -->




        </div>


    </div>
    <script src="js/table.js"></script>
    <script src="js/orders.js"></script>
    <script src="js/index.js"></script>
</body>

</html>
