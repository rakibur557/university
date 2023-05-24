<?php

if (isset($_POST['export'])) {
	include 'confiq.php';
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('ID','Name','Age','Gender','District','Infected_Date', 'Recovery','Death','Vaccinated','Vaccine_Name'));
	$sql = "SELECT * FROM patient_data;";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		fputcsv($output, $row);
	}
	fclose($output);
}




?>