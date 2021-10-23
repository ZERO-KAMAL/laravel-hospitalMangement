
<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
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
            @include('admin.body')
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.js')
   @stack('js')
</body>

</html>
