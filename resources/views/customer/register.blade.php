<!DOCTYPE html>
<html>
<head>
<style>
  .h1{
	color:  blue;
	  }
</style>
	<meta charset="utf-8">
	<title>Signup</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="reg/css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="reg/fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="reg/css/style.css"/><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body class="form-v4">
	<div class="page-content">
	
	
		<div class="form-v4-content">
		
			<div class="form-left">
				<h2>Dear Users!</h2>
				<p class="text-1">Kindly inform you,</p>
				<p class="text-2">Please Signup Here</p>
				
				
				
			</div>
			<h1>
			
			</h1>
			<form class="form-detail" action="{{url('/createaccount')}}" method="POST" id="myform">
			{{ csrf_field() }}
			@if (Session::has('status'))
			       <div class="alert alert-success">
				       {{Session::get('status')}}
				   </div>
		    @endif
			@if (count($errors) > 0)
			       <div class="alert alert-danger">
				        <ul>
						    @foreach ($errors->all() as $error)
							    <li>{{$error}}</li>
							@endforeach
						</ul>
				       
				   </div>
			@endif
			@if (Session::has('warning'))
			       <div class="alert alert-danger">
				       {{Session::get('warning')}}
				   </div>
		    @endif
				<h2>SIGNUP NOW</h2>
				
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">First Name</label>
						<input type="text" name="firstname" id="first_name" class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="last_name">Last Name</label>
						<input type="text" name="lastname" id="last_name" class="input-text" required>
					</div>
				</div>
				<div class="form-row">
					<label for="your_email">Your Email</label>
					<input type="text" name="email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="input-text" required>
					</div>
					
				
					<div class="form-row form-row-1 ">
						<label for="password">Confirm Password</label>
						<input type="password" name="confirm_password" id="password" class="input-text" required>
					</div>
					
				</div>
				
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Signup">
				</div>
				<div>
				<ul>
				<li>
				<p class="text-2"><span></span><a href="/logincustomer"> Already have an account please login here.</a></p></li>
				<li><p class="text-2"><span></span><a href="/"> Home</a></p></li>
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		// just for the demos, avoids form submit
		//jQuery.validator.setDefaults({
		//  	debug: true,
		//  	success:  function(label){
        	//	label.attr('id', 'valid');
   		 //	},
		});
		//$( "#myform" ).validate({
		  //	rules: {
			  //  password: "required",
		    //	comfirm_password: {
		      //		equalTo: "#password"
		    //	}
		  //	},
		  //	messages: {
		  	//	first_name: {
		  		//	required: "Please enter a firstname"
		  	//	},
		  	//	last_name: {
		  	//		required: "Please enter a lastname"
		  	//	},
		  	//	your_email: {
		  	//		required: "Please provide an email"
		  	//	},
		  	//	password: {
	  		//		required: "Please enter a password"
		  	//	},
		  	//	comfirm_password: {
		  	//		required: "Please enter a password",
		     // 		equalTo: "Wrong Password"
		    //	}
		  //	}
		//});
	</script>-->
</body>
</html>