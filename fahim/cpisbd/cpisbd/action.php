<?php
session_start();
include 'confiq.php';

if (isset($_GET['pageno'])) {
	$pageno = $_GET['pageno'];
} else {
	$pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;

$conn=mysqli_connect("localhost", "root", "", "practice");
        			// Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}

$count;
if (isset($_POST['query'])) {
	$filtervalues = $_POST['query'];

						$name = "%$filtervalues%"; // prepare the $name variable 
						$sql = "SELECT * FROM `patient_data` WHERE CONCAT(patient_name) LIKE ? OR area LIKE ?"; // SQL with parameters
						$stmt = $conn->prepare($sql); 
						$stmt->bind_param("ss", $name,$name); // here we can use only a variable
						$stmt->execute();
						$result = $stmt->get_result(); // get the mysqli result
						$count= mysqli_num_rows($result);
						 //echo "<p>$count</p>";
						}
						// if ($count>0) {
						// 	echo "<p>$count</p>";
						// }
						if (mysqli_num_rows($result)>0) {

							echo"
							<tbody>
							<thead class='table-dark'>
							<tr>
							<th>ID No</th>
							<th>Name</th>
							<th>Age</th>
							<th>Gender</th>
							<th>District</th>
							<th>Infected Date</th>
							<th>Recovered</th>
							<th>Death</th>
							<th>Vaccinated</th>
							<th>Vaccine Name</th>
							<th>Action</th>
							</tr>
							</thead>";

							while($row = mysqli_fetch_array($result)){

								echo "		
								<tr>
								<td>$row[id]</td>
								<td>$row[patient_name]</td>
								<td>$row[age]</td>
								<td>$row[gender]</td>
								<td>$row[area]</td>
								<td>$row[detect_date]</td>
								<td>$row[recovery]</td>
								<td>$row[death]</td>
								<td>$row[vaccinated]</td>
								<td>$row[vaccine_name]</td>
								<td>
								<a href='/jamalpur/update.php?updateid=$row[id]' class='btn btn-warning btn-sm'>Edit</a>
								<button class='deletebtn btn btn-danger btn-sm'>Delete</button>
								</td>
								</tr>
								";
								
							}
							echo "</tbody>";
						}
					
						else{
							echo "
							<thead class='table-dark'>
							<tr>
							<th>ID No</th>
							<th>Name</th>
							<th>Age</th>
							<th>Gender</th>
							<th>District</th>
							<th>Infected Date</th>
							<th>Recovered</th>
							<th>Death</th>
							<th>Vaccinated</th>
							<th>Vaccine Name</th>
							<th>Action</th>
							</tr>
							</thead>
							<tr>
							<td align='center' colspan='11'> No Record Found </td>
							</tr>
							</tbody>
							";
						}

					//}

					mysqli_close($conn);
				?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CPISBD</title>
</head>
<body>

    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="delete.php" method="POST">
      <div class="modal-body">
        <div class="modal-body">

            <input type="hidden" name="delete_id" id="delete_id">

            <p>This process can't be undone. By clicking the delete you are agreed to remove the record.</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="deletedata" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
</body>
</html>