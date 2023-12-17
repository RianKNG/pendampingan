<!DOCTYPE html>
<html>
<head>
	<title>Login E-DIL</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('adminLTE') }}/css/style.css">
	<link rel="stylesheet" href="{{ asset('adminLTE') }}/dist/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="{{ asset('adminLTE/dist/img/wave.png') }}">
	<div class="container">
		<div class="img">
			{{-- <img src="img/bg.svg"> --}}
			<img src="{{ asset('adminLTE/dist/img/a.png') }}" width="500px" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		</div>
		<div class="login-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
				<img src="{{ asset('adminLTE/dist/img/avatar.svg') }}">
				<h2 class="title"></h2>
                <h1><span>Selamat Datang di E-Sif-DIL</span></h1>
				
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nama</h5>
                        <input type="email" class="input" name="email">
					</div>
           		</div>
				
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
                           <input type="password" class="input" name="password">
            	   </div>
				   @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            	</div>
            	<a href="{{ route('register') }}">Register?</a>
            	 <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </form>
        </div>
    </div>
	<script src="{{ asset('adminLTE') }}/dist/js/main.js"></script>
</body>
</html>
