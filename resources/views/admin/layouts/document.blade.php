<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('admin.partials.navigation')
  @include('admin.partials.sidebar') 

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
             @foreach ($errors->all() as $error)
          <li>
            {{ $error }}
          </li>
           @endforeach
        </ul>  
        </div>  
           @endif
      @yield('content')   
      </div>
    </section>
  </div>
  @include('admin.partials.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
@include('admin.partials.javascripts')
</body>
</html>