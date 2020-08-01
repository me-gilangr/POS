<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('') }}assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('') }}assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ asset('') }}assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('') }}assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
    @include('layouts.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('layouts.navbar')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-4">
      <div class="container-fluid">
        {{-- <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--5">
        <div class="row">
            @yield('content')
        </div>
      <!-- Dark table -->

      <!-- Footer -->

    </div>
    <div class="container-fluid  mt-6">
            @include('layouts.footer')
    </div>

  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('') }}assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('') }}assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('') }}assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{ asset('') }}assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ asset('') }}assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="{{ asset('') }}assets/js/argon.js?v=1.2.0"></script>
</body>

</html>