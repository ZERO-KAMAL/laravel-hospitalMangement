<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        /* .doctor-db input {
            width: 60% !important;
            color: black;
            border-radius: 3px;
        }

        .doctor-db select {
            color: black;
            width: 60%;
        }

        .doctor-db .col-md-6 {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .doctor-db .btnn {
            padding: 12px 30px;
        } */
        .main-table td {
            padding: 4px;
        }

        .main-table th {
            background-color: #0F1015;
            color:
                white;
            text-align: center;
            padding: 10px 0px !important;
        }

    </style>
</head>

<body>
    <div class="container-scroller">

        {{-- siderbar --}}
        @include('admin.sidebar')


        <div class="container-fluid page-body-wrapper">

            {{-- include --}}
            @include('admin.navbar')
            {{-- body-content --}}
            <div class="container-fluid page-body-wrapper">


                <div class="main-table table-responsive py-5">
                    <div class="row">
                        <div class="col-md-12">

                            {{-- table bootstrap class we can add to it beautiful but not desired --}}
                            <table class=" table-bordered  ">
                                <thead class="thead-dark">
                                    <tr class="table-dark">
                                        <th scope="col">S.N</th>
                                        <th scope="col">Doctor Name</th>
                                        <th scope="col">Phone </th>
                                        <th scope="col">Specility</th>
                                        <th scope="col">Room No</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Delete</th>
                                        <th scope="col">Image</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $doctor)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $doctor->name }}</td>
                                            <td>{{ $doctor->specility }}</td>
                                            <td>{{ $doctor->phone }}</td>
                                            <td>{{ $doctor->room }}</td>
                                            <td><img src="doctorimage/{{ $doctor->image }}" alt=""
                                                    style="height: 200px; width:200px;"></td>
                                            <td><a onclick="return confirm('Are you sure to delete this')"
                                                    href="{{ url('deletedoctor', $doctor->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                            <td><a class="btn btn-primary "
                                                    href="{{ url('updatedoctor', $doctor->id) }}">Update</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.js')
</body>

</html>
