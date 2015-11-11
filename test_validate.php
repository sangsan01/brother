<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Your description here">
    <meta name="author" content="Your Name">
    <title>Learning Boostrap</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/basic-template.css" rel="stylesheet" />

	<!-- BootstrapValidator CSS -->
    <link href="css/bootstrapValidator.min.css" rel="stylesheet"/>
	
    <!-- jQuery and Bootstrap JS -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
		
	<!-- BootstrapValidator -->
    <script src="js/bootstrapValidator.min.js" type="text/javascript"></script>
		
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">Registration</div>
			<div class="panel-body">
				<form id="registration-form" method="POST" class="form-horizontal" action="#">
					<div class="form-group">
						<label class="col-md-2 control-label" for="email">Email Address</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="email" name="email" placeholder="Your email address" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="password">Password</label>
						<div class="col-md-4">
							<input type="password" class="form-control" id="password" name="txtpassword" placeholder="Password" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="confirmpassword">Confirm Password</label>
						<div class="col-md-4">
							<input type="password" class="form-control" id="confirmpassword" name="txtconfirmpassword" placeholder="Confirm password" />	
						</div>
					</div>					
					<div class="form-group">
						<label class="col-md-2 control-label" for="membership">Membership</label>
						<div class="col-md-4">
							<select class="form-control" id="membership" name="membership">
								<option value="0">Choose One</option>
								<option value="1">Basic (Free)</option>
								<option value="2">Premium (Paid)</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-2">
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</form>
				<div id="confirmation" class="alert alert-success hidden">
					<span class="glyphicon glyphicon-star"></span> Thank you for registering
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function () {
		var validator = $("#registration-form").bootstrapValidator({
			feedbackIcons: {
				valid: "glyphicon glyphicon-ok",
				invalid: "glyphicon glyphicon-remove", 
				validating: "glyphicon glyphicon-refresh"
			}, 
			fields : {
				email :{
					message : "Email address is required",
					validators : {
						notEmpty : {
							message : "Please provide an email address"
						}, 
						stringLength: {
							min : 6, 
							max: 35,
							message: "Email address must be between 6 and 35 characters long"
						},
						emailAddress: {
							message: "Email address was invalid"
						}
					}
				}, 
				txtpassword : {
					validators: {
						notEmpty : {
							message : "Password is required"
						},
						stringLength : {
							min: 8,
							message: "Password must be 8 characters long"
						}, 
						different : {
							field : "email", 
							message: "Email address and password can not match"
						}
					}
				}, 
				txtconfirmpassword : {
					validators: {
						notEmpty : {
							message: "Confirm password field is required"
						}, 
						identical : {
							field: "password", 
							message : "Password and confirmation must match"
						}
					}
				}, 
				membership : {
					validators : {
						greaterThan : {
							value: 1,
							message: "Membership is required"
						}
					}
				}
			}
		});
	
		validator.on("success.form.bv", function (e) {
			e.preventDefault();
			$("#registration-form").addClass("hidden");
			$("#confirmation").removeClass("hidden");
		});
		
	});
</script>
</html>