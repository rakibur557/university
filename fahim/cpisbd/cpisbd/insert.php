<?php 
include 'confiq.php';

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$district = $_POST['district'];
	$date = date('y-m-d', strtotime($_POST['date']));
	$recovery = $_POST['recovery'];
	$death = $_POST['death'];
	$vaccinated = $_POST['vaccinated'];
	$vaccine_name = $_POST['vaccine_name'];


	$sql1 = "INSERT INTO `patient_info` (`id`, `patient_name`, `age`, `gender`, `area`) VALUES
	(NULL, '$name', $age, '$gender', '$district');";
	$result1 = mysqli_query($conn, $sql1);

	$sql2 = "INSERT INTO `covid_info` (`id`,`detect_date`, `recovery`, `death`, `vaccinated`, `vaccine_name`) VALUES
	(NULL,'$date', '$recovery', '$death', '$vaccinated', '$vaccine_name');";
	$result2 = mysqli_query($conn, $sql2);

	$sql3 = "INSERT INTO `patient_data` (`id`, `patient_name`, `age`, `gender`, `area`,`detect_date`, `recovery`, `death`, `vaccinated`, `vaccine_name`) VALUES
	(NULL, '$name', $age, '$gender', '$district','$date', '$recovery', '$death', '$vaccinated', '$vaccine_name');";
	$result3 = mysqli_query($conn, $sql3);

	if($result1 && $result2){
		echo"
		<div class='alert alert-success alert-dismissible fade show' role='alert'>
					<strong>Data inserted Successfully</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				  </div>
		";
			
	}
	else{
		echo "FAILED: ".mysqli_error($conn);
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CPIS-BD</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container my-5">
		<h2 align="center">Add Patient Data</h2><br>
		<form action="" method="POST">

			<!-- Name Field -->
			<div class="row mb-2 ">
				<label class="col-sm-3 col-form-label">Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="name" value="" placeholder="Enter Patient Name" required>
				</div>
			</div>

			<!-- Age Field -->
			<div class="row mb-2">
				<label class="col-sm-3 col-form-label">Age</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="age" value="" placeholder="Enter Patient Age" required>
				</div>
			</div>

			<!-- Gender Field -->
			<div class=" form-group row mb-2">
				<label class="col-sm-3 col-form-label">Gender</label>
				<div class="col-sm-6">
					<input type="radio" class="form-check-input" name="gender" value="Male" required><label class="form-input-label" style="margin-left: 5px; margin-right: 20px;">Male</label>

					<input type="radio" class="form-check-input" name="gender" value="Female" required><label style="margin-left: 5px;">Female</label>
				</div>
				
			</div>

			<!-- District Field -->
			<div class="row mb-2">
				<label class="col-sm-3 col-form-label">District</label>
				<div class=" dropdown col-sm-6">
					<select name="district" class="form-select" name="district" aria-label="Default select example" required>
						<?php 
						$data = file_get_contents('district.json');
						$dataOK = json_decode($data);

						?>
						<option value="" selected>Select District</option>
						<?php 
							//$count=1;
						foreach ($dataOK as $ok) {
							$val= $ok->name;
							echo "
							<option value='$val'>$ok->name</option>
							";
								//$count++;

						}
						?>
					</select>
				</div>
			</div>

			<!-- Date -->
			<div class="row mb-2">
				<label class="col-sm-3 col-form-label">Infected Date</label>
				<div class=" dropdown col-sm-6">
					<input type="date" class="form-control" name="date" value="" required>
				</div>
			</div>

			
			<!-- Recovery -->
			<div class="row mb-2">
				<label class="col-sm-3 col-form-label">Recovery</label>
				<div class=" dropdown col-sm-6">
					<select class="form-select form-control" name="recovery" aria-label="Default select example" required>
						<option value="" selected>Select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
			</div>

			<!-- Death -->
			<div class="row mb-2">
				<label class="col-sm-3 col-form-label">Death</label>
				<div class=" dropdown col-sm-6">
					<select class="form-select" name="death" aria-label="Default select example" required>
						<option value="" selected>Select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
			</div>

			<!-- Vaccinated -->
			<div class="row mb-2">
				<label class="col-sm-3 col-form-label">Vaccinated</label>
				<div class=" dropdown col-sm-6">
					<select class="form-select" name="vaccinated" aria-label="Default select example" required>
						<option value="" selected>Select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
			</div>

			<!-- Vaccine Name -->
			<div class="row mb-4">
				<label class="col-sm-3 col-form-label">Vaccine Name</label>
				<div class=" dropdown col-sm-6">
					<select class="form-select" name="vaccine_name" aria-label="Default select example">
						<option value="" selected>Select Vaccine</option>
						<option value="Phyzer">Phyzer</option>
						<option value="Sinopharm">Sinopharm</option>
						<option value="Mordana">Mordana</option>
						<option value="Astrageneca">Astrageneca</option>
					</select>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div  class="text-center">
							<button  class="btn btn-primary " type="submit" name="submit">Submit</button>
							<a class="btn btn-danger " href="home.php">Back Home</a>
						</div>
					</div>
				</div>
			</div>
		</form>

	</div>		
	

	<!-- Bootstrap JS CDN -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	
		
</body>
</html>