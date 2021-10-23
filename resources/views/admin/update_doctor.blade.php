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

        .oldImage{
            height: 150px;
            width: 150px;
        }
    </style>
    @stack('css')


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
                   {{-- changing data for individual id --}}
                    <form action="{{ url('editdoctor',$data->id) }}" method="POST" enctype="multipart/form-data"
                        class="d-flex flex-wrap">
                        @csrf
                        <div class=" col-md-6 mt-4 ">
                            <label for="">Doctor Name:-</label>
                            <input type="text" name="name" placeholder="Write the name" required="">
                        </div>
                        <div class=" col-md-6  mt-4 d-flex ">
                            <label for="">Phone:-</label>
                            <input type="tel" name="phone" placeholder="Write the phone" required="">
                        </div>
                        <div class=" col-md-6  mt-4">
                            <label for="">Speciality:-</label>
                            <select name="speciality" id="">
                                <option value="skin">skin</option>
                                <option value="nose">heart</option>
                                <option value="eye">eye</option>
                                <option value="ear">nose</option>
                            </select>
                        </div>
                        <div class=" col-md-6  mt-4">
                            <label for="">Room No:-</label>
                            <input type="text" name="room" placeholder="Write Room Number" required="">
                        </div>
                        <div class=" col-md-6  mt-4">
                            <label for="">Old Image:-</label>
                            <img src="doctorimage/{{$data->image}}" class="oldImage" alt="">
                        </div>
                        <div class=" col-md-6  mt-4">
                            <label for="">Change Image:-</label>
                            <input type="file" name="file" required="">
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
    @stack('js')
</body>

</html>
