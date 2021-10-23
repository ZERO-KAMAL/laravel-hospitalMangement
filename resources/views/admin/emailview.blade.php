<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">
    @include('admin.css')
    <style>
        .doctor-db input {
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



                <div class="container doctor-db">
                    @if (session()->has('message'))
                        <div class="alert alert-success mt-3">

                            <button type="button" class="close" data-dismiss='alert'>X</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{ url('sendemail',$data->id) }}" method="POST"
                        class="d-flex flex-wrap">
                        @csrf
                        <div class=" col-md-6 mt-4 ">
                            <label for="">Greeting:-</label>
                            <input type="text" name="greeting" placeholder="" required="">
                        </div>
                        <div class=" col-md-6  mt-4 d-flex ">
                            <label for="">Body:-</label>
                            <input type="text" name="body" placeholder="" required="">
                        </div>

                        <div class=" col-md-6  mt-4">
                            <label for="">Action Text:-</label>
                            <input type="text" name="actiontext" placeholder="Write Room Number" required="">
                        </div>
                        <div class=" col-md-6  mt-4">
                            <label for="">Action url:-</label>
                            <input type="text" name="actionurl" placeholder="Write Room Number" required="">
                        </div>
                        <div class=" col-md-6  mt-4">
                            <label for="">End Part:-</label>
                            <input type="text" name="endpart" placeholder="Write Room Number" required="">
                        </div>
                        <div class="row col-md-12 mt-4 justify-center">

                            <button type="submit" class="btn btn-success btnn">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.js')
</body>

</html>
