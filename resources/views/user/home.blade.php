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

    @include('user.herobg')

    @include('user.whyus')

    @include('user.doctor')

    @include('user.news')

    @include('user.appointment')

    {{-- <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                    <div class="img-banner d-none d-lg-block">
                        <img src="../assets/img/mobile_app.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                    <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application
                    </h1>
                    <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
                    <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div> <!-- .banner-home --> --}}

    @include('user.footer')

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>
