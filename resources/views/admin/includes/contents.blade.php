<div class="content-wrapper">
  {{-- Content Header (Page header) --}}
  
  {{-- /.content-header --}}

  {{-- Main content --}}
  <div class="content">
    <div class="container-fluid">
      @include('admin.includes.alerts.failure')
      @include('admin.includes.alerts.success')
      @yield('content')
    </div>{{-- /.container-fluid --}}
  </div>
  {{-- /.content --}}
</div>