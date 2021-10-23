<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
</head>

<body>

    @include('user.header')
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">

            <button type="button" class="close" data-dismiss='alert'>X</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <section>

        <div class="container table-responsive py-5">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark" >
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Appointment Cancel</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($appoint as $appoints)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $appoints->doctor }}</td>
                            <td>{{ $appoints->date }}</td>
                            <td>{{ $appoints->message }}</td>
                            <td>{{ $appoints->status }}</td>
                            <td><a href="{{ url('cancel_appoint', $appoints->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this.')">Cancel</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </section>



    @include('user.footer')

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>
