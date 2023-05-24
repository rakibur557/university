<?php
// Load the database configuration file
$db = mysqli_connect("localhost", "root", "", "practice");

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id   = $line[0];
                $patient_name  = $line[1];
                $age  = $line[2];
                $gender = $line[3];
                $area = $line[4];
                $detect_date = $line[5];
                $recovery = $line[6];
                $death = $line[7];
                $vaccinated = $line[8];
                $vaccine_name = $line[9];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM patient_data WHERE age = '".$line[2]."'";
                $prevResult = $db->query($prevQuery);

                // $prevQuery1 = "SELECT id FROM patient_data WHERE age = '".$line[2]."'";
                // $prevResult1 = $db->query($prevQuery1);
                
                

                if($prevResult->num_rows <= 0){
                    // Insert member data in the database
                    $db->query("INSERT INTO patient_data (id, patient_name, age, gender, area, detect_date, recovery, death, vaccinated, vaccine_name) VALUES ('".$id."', '".$patient_name."', '".$age."', '".$gender."', '".$area."', '".$detect_date."', '".$recovery."', '".$death."', '".$vaccinated."', '".$vaccine_name."')");

                    $db->query("INSERT INTO `patient_info` (`id`, `patient_name`, `age`, `gender`, `area`) VALUES
    (NULL, '$patient_name', $age, '$gender', '$area');");

                    $db->query("INSERT INTO `covid_info` (`id`,`detect_date`, `recovery`, `death`, `vaccinated`, `vaccine_name`) VALUES
    (NULL,'$detect_date', '$recovery', '$death', '$vaccinated', '$vaccine_name');");

                    header("Location: /cpisbd/home.php");


                }
            }
            
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Duplicated Data Found</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";

            // Close opened CSV file
            fclose($csvFile);
        }
    }
}
?>