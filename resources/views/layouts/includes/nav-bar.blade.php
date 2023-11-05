<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
        </li>
    </ul>


    <div class="sidebar  ml-auto">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">
            <div class="image">
                @if(isset(auth()->user()->image) && !empty(auth()->user()->image))
                    <img src="{{ asset('img/registration/'.auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ asset('img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" style="color: black" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>
</nav>
  <!-- /.navbar -->
