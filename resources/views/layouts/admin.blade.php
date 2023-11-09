@include('admin.includes.headerstart')
  @section ('headerLinks')
{{-- Font Awesome Icons --}}
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
  {{-- Google Font: Source Sans Pro
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/SansPro/SansPro.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-4.0.0-dist/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">

  {{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('assets/admin/css/mycustomstyle.css') }}">
  @show
</head>
<body class="hold-transition sidebar-mini" dir="rtl">
<div class="wrapper">

  {{-- Navbar --}}
  @include('admin.includes.navbar')
  {{-- /.navbar --}}

  {{-- Main Sidebar Container --}}
  @include('admin.includes.sidebar')

  {{-- Content Wrapper. Contains page content --}}
  @include('admin.includes.contents')
  {{-- /.content-wrapper --}}

  {{-- Control Sidebar --}}
  {{-- <aside class="control-sidebar control-sidebar-dark"> --}}
    {{--  Control sidebar content goes here  --}}
    {{-- <div class="p-3"> --}}
      {{-- <h5>Title</h5> --}}
      {{-- <p>File Place: C:\wamp\www\newwebsite\resources\views\layouts\admin.blade.php</p> --}}
    {{-- </div> --}}
  {{-- </aside> --}}
  {{-- /.control-sidebar --}}

  {{-- Main Footer --}}
  @include('admin.includes.footer')
</div>
{{--   ./wrapper   --}}

  {{-- -- REQUIRED SCRIPTS -- --}}
  @section('footerLinks')
  {{-- jQuery  --}}
  <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
  {{-- Bootstrap 4  --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('assets\admin\js\myscripts.js') }}"></script>
  @show

  @yield('script')
</body>
</html>
