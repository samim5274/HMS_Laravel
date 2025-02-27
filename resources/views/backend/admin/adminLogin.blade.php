<!DOCTYPE html>
<html lang="en">

<head>

	<title>Flat Able - Premium Admin Template by Phoenixcoded</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="/assets/css/style.css">
	
	


</head>
<body>
    
    <!-- [ auth-signin ] start -->
    <div class="auth-wrapper">
        <div class="auth-content text-center">
            <img src="/assets/images/logo.png" alt="" class="img-fluid mb-4">
            <div class="card borderless">
                <div class="row align-items-center ">
                    <div class="col-md-12">
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->all() as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                            @endif
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            <h4 class="mb-3 f-w-400">Signin</h4>
                            <hr>
                            <form action="/admin-user-login" method="GET">
                                <div class="form-group mb-3">
                                    <input type="text" name="txtEmail" class="form-control" id="Email" placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" name="txtPassword" class="form-control" id="Password" placeholder="Password">
                                </div>
                                <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Save credentials.</label>
                                </div>
                                <button class="btn btn-block btn-primary mb-4">Signin</button>
                            </form>
                            <hr>
                            <p class="mb-2 text-muted">Forgot password? <a href="#" class="f-w-400">Reset</a></p>
                            <p class="mb-0 text-muted">Don’t have an account? <a href="/admin-register" class="f-w-400">Signup</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>


</body>

</html>
