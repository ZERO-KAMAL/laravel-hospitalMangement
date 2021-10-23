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
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Doctor Name</th>
                                        <th scope="col"> Date</th>
                                        <th scope="col"> Message</th>
                                        <th scope="col"> Status</th>
                                        <th scope="col"> Approved</th>
                                        <th scope="col"> Cancel</th>
                                        <th scope="col"> Send main</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $appoint)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $appoint->name }}</td>
                                            <td>{{ $appoint->email }}</td>
                                            <td>{{ $appoint->phone }}</td>
                                            <td>{{ $appoint->doctor }}</td>
                                            <td>{{ $appoint->date }}</td>
                                            <td>{{ $appoint->message }}</td>
                                            <td style="color: white!important;">{{ $appoint->status }}</td>

                                            <td><a class="btn btn-success "
                                                    href="{{ url('approved', $appoint->id) }}">Approved</a>
                                            </td>
                                            <td><a href="{{ url('delete', $appoint->id) }}"
                                                    class="btn btn-danger">Cancel</a>
                                            </td>

                                            <td><a href="{{ url('emailview', $appoint->id) }}"
                                                    class="btn btn-primary">Send Mail</a>
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
