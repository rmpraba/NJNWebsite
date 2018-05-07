<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
<div class="outer">
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
      <a class="navbar-brand"><img src="{{asset('img/logo.png')}}" alt="Logo goes Here"></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Contact us @ 1234567890</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">English
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">English</a></li>
          <li><a href="#">Kannada</a></li>
        </ul>
      </li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a  href="#" data-target="#login-modal" id="loginlogout"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<nav class="navbar navbar-default header">
  <div class="container-fluid">
    <!-- <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div> -->
    <ul class="nav navbar-nav navbar-center">
      <li><a href="/">HOME</a></li>
      <li><a href="#">ABOUT US</a></li>
      <li><a href="#">POLICIES</a></li>
      <li><a href="#">SCHEMES</a></li>
      <li><a href="#">NOTIFICATION</a></li>
      <li><a href="#">CIRCULAR</a></li>
      <li><a href="#">ACTS</a></li>
      <li><a href="#">CITIZENS</a></li>
      <li><a href="#">GALLERY</a></li>
      <li><a href="#">CONTACT US</a></li>
    </ul>
  </div>
</nav>
</div>
<!-- Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;margin-top: 10%;">
    	<div class="modal-dialog">
				<div class="loginmodal-container">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1>Login to Your Account</h1><br>
				  <form action="/login" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
		</div>
</div>
 