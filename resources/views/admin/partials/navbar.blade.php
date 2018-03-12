<ul class="nav navbar-nav">
    <li @if (Request::is('departments*')) class="active" @endif>
        <a href="/departments">Departments</a>
    </li>
    <li @if (Request::is('employees*')) class="active" @endif>
        <a href="/employees">Employees</a>
    </li>
</ul>
<ul class="nav navbar-nav navbar-right">

  <li>
     <form method="GET" action="{{ url('employees/search') }}" style="margin-top: 7px;">
       <input id="keyword" placeholder="Search employees" name="keyword" type="text" value="">
       <input class="btn btn-default" type="submit" value="Search">
     </form>
 </li>

  @if (Auth::guest())
    <li><a href="/auth/login">Login</a></li>
  @else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }}
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="/auth/adduser"><i class="fa fa-plus"></i> Add Admin</a></li>
            <li><a href="/auth/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
            <li><a href="/change-password"><i class="fa fa-key"></i> Change Password</a></li>
        </ul>
    </li>
  @endif
</ul>