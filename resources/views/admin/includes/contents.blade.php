<div class="content-wrapper">
  {{-- Content Header (Page header) --}}
  <div class="content-header">
    <div class="container">
      <div class="titles mb-2">
        {{-- <div class="view-title">
          <h1 class="m-0 text-dark">@yield('homePage')</h1>
        </div>/.col --}}
        
      </div>{{-- /.row --}}
    </div>{{-- /.container-fluid --}}
  </div>
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