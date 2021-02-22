<html>
<head>
<title>Add Customer</title>
</head>
<body>
	<div>
		<form action="addcustomer" method="post">
			{{ csrf_field() }}
			<!-- Table Div -->
			<div class="demo-table">
				<div class="form-head">Add Customer</div>
				<!-- Begin firstName -->
				<div class="form-column">
					<div>
						<label for="firstName">First Name</label><span id="firstName_info"
							class="error-info"></span>
						
					</div>
					<div>
						<input name="firstName" id="firstName" type="text"
							class="demo-input-box">
						<?php echo $errors->first('firstName')?>
					</div>
				</div>
				<!-- End firstName -->
				<!-- Begin lastName -->
				<div class="form-column">
					<div>
						<label for="lastName">Last Name</label><span id="lastName_info"
							class="error-info"></span>
					</div>
					<div>
						<input name="lastName" id="lastName" type="text"
							class="demo-input-box">
						<?php echo $errors->first('lastName')?>
					</div>
				</div>
				<div>
					<input type="submit" class="btnLogin">
				
				</div>
			</div>
		</form>

	</div>
</body>
</html>