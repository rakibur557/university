<?php 
include 'confiq.php';
	$id = $_GET['updateid'];
	//echo "$id";
	$sql_view = "SELECT * FROM patient_info, covid_info where patient_info.id = covid_info.id and patient_info.id = $id;";
	$res = mysqli_query($conn, $sql_view);
	$row = mysqli_fetch_assoc($res);

	$name = $row['patient_name'];
	//echo "$name";
	$age = $row['age'];
	$gender = $row['gender'];
	$district = $row['area'];
	$date = $row['detect_date'];
	$recovery = $row['recovery'];
	$death = $row['death'];
	$vaccinated = $row['vaccinated'];
	$vaccine_name = $row['vaccine_name']; 

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

	$sql1 = "UPDATE `patient_info` SET `id`='$id',`patient_name`='$name',`age`='$age',`gender`='$gender',`area`='$district' WHERE id = $id;";
	$result1 = mysqli_query($conn, $sql1);

	$sql2 = "UPDATE `covid_info` SET `id`='$id',`detect_date`='$date',`recovery`='$recovery',`death`='$death',`vaccinated`='$vaccinated',`vaccine_name`='$vaccine_name' WHERE id = $id;";
	$result2 = mysqli_query($conn, $sql2);

	if($result1 && $result2){
		echo"
		<div class='alert alert-success alert-dismissible fade show' role='alert'>
					<strong>Updated Successfully</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				  </div>
		";
		header("Location: home.php");
			
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
		<h2>Add a New Data</h2><br>
		<form action="" method="POST">

			<!-- Name Field -->
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Enter patient name" required>
				</div>
			</div>

			<!-- Age Field -->
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Age</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="age" value="<?php echo $age; ?>" placeholder="Enter patient age" required>
				</div>
			</div>

			<!-- Gender Field -->
			<div class=" form-group row mb-3">
				<label class="col-sm-3 col-form-label">Gender</label>
				<div class="col-sm-6">
					<input type="radio" class="form-check-input" name="gender" value="Male" required
					<?php
						if($gender == "Male"){
							echo "checked";
						}
					?>
					><label class="form-input-label" style="margin-left: 5px; margin-right: 20px;">Male</label>

					<input type="radio" class="form-check-input" name="gender" value="Female" required
						<?php
						if($gender == "Female"){
							echo "checked";
						}
					?>
					><label style="margin-left: 5px;">Female</label>
				</div>
				
			</div>

			<!-- District Field -->
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">District</label>
				<div class=" dropdown col-sm-6">
					<select class="form-select" name="district" aria-label="Default select example" required>
						<?php 
						$data = file_get_contents('district.json');
						$dataOK = json_decode($data);

						foreach ($dataOK as $ok) {
							$val= $ok->name;
							if($district == $val){
								echo "
							<option value='$val' seleced>$ok->name</option>
							";
							}		
						}
						foreach ($dataOK as $ok) {
							$val= $ok->name;
							echo "
							<option value='$val'>$ok->name</option>
							";
						}
						?>
					</select>
				</div>
			</div>

			<!-- Date -->
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Infected Date</label>
				<div class=" dropdown col-sm-6">
					<input type="date" class="form-control" name="date" required
					placeholder="dd-mm-yyyy" value="<?php echo "$date"; ?>"
        min="1997-01-01" max="2030-12-31">
				</div>
			</div>

			
			<!-- Recovery -->
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Recovery</label>
				<div class=" dropdown col-sm-6">
					<select class="form-select form-control" name="recovery" aria-label="Default select example" required>
						<!-- <option value="" selected>Select</option> -->
						<option value="Yes" <?php
						if($recovery == "Yes"){
							echo "selected";
						}
					?>>Yes</option>
						<option value="No" <?php
						if($recovery == "No"){
							echo "selected";
						}
					?>>No</option>
					</select>
				</div>
			</div>

			<!-- Death -->
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Death</label>
				<div class=" dropdown col-sm-6">
					<select class="form-select" name="death" aria-label="Default select example" required>
						<!-- <option value="" selected>Select</option> -->
						<option value="Yes" <?php
						if($death == "Yes"){
							echo "selected";
						}
					?>>Yes</option>
						<option value="No" <?php
						if($death == "No"){
							echo "selected";
						}
					?>>No</option>
					</select>
				</div>
			</div>

			<!-- Vaccinated -->
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Vaccinated</label>
				<div class=" dropdown col-sm-6">
					<select class="form-select" name="vaccinated" aria-label="Default select example" required>
						<!-- <option value="" selected>Select</option> -->
						<option value="Yes" <?php
						if($vaccinated == "Yes"){
							echo "selected";
						}
					?>>Yes</option>
						<option value="No" <?php
						if($vaccinated == "No"){
							echo "selected";
						}
					?>>No</option>
					</select>
				</div>
			</div>

			<!-- Vaccine Name -->
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Vaccine Name</label>
				<div class=" dropdown col-sm-6">
					<select class="form-select" name="vaccine_name" aria-label="Default select example">
						<!-- <option value="" selected>Select Vaccine</option> -->
						<option value="Phyzer" <?php
						if($vaccine_name == "Phyzer"){
							echo "selected";
						}
					?>>Phyzer</option>
						<option value="Sinopharm" <?php
						if($vaccine_name == "Sinopharm"){
							echo "selected";
						}
					?>>Sinopharm</option>
						<option value="Mordana" <?php
						if($vaccine_name == "Mordana"){
							echo "selected";
						}
					?>>Mordana</option>
						<option value="Astrageneca" <?php
						if($vaccine_name == "Astrageneca"){
							echo "selected";
						}
					?>>Astrageneca</option>
					</select>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div  class="text-center">
							<button class="btn btn-primary" type="submit" name="submit">Update</button>
			<a class="btn btn-danger" href="/cpisbd/home.php">Cancel</a>
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