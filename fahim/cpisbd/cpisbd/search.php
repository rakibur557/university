<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CPIS-BD</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	
</head>
<body>

		<div class="container my-5 table-responsive">
			<h2 align="center">List of Patients</h2>

			<!-- Search Section-->
			<div class="row">
				<div class="col-md-8">
					<form action="" method="GET">
						<div class="input-group mb-3">
							<input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>"class="form-control" placeholder="Search Data" required>

							<button type="submit" class="btn btn-primary">Search</button>
						</div>	
					</form>
					
			</div>
			<div class="col-md-4">
						<a href="#" class="btn btn-warning">Filter Search</a>
						<a href="insert.php" class="btn btn-success">Add New</a>
						<a href="#" class="btn btn-danger">Logout</a>
					</div>
			</div>

			<!-- <button class="btn btn-success" >Add New</button> -->
			<table class="table">
				<thead class="table-dark">
					<tr>
						<th>SL.</th>
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
				<tbody>
					<?php
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

					if (isset($_GET['search'])) {
						$filtervalues = $_GET['search'];
						
						$name = "%$filtervalues%"; // prepare the $name variable 
						$sql = "SELECT * FROM patient_info, covid_info WHERE patient_info.id = covid_info.id CONCAT(patient_name) LIKE ?"; // SQL with parameters


						$stmt = $conn->prepare($sql); 
						$stmt->bind_param("s", $name); // here we can use only a variable
						$stmt->execute();
						$result = $stmt->get_result(); // get the mysqli result
						//$rows = $result->fetch_all(MYSQLI_ASSOC); // all rows matched

						if (mysqli_num_rows($result)>0) {
								//$res_data = mysqli_query($conn,$sql);
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
						<a href='/jamalpur/update.php?updateid=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
						<button class='deletebtn btn btn-danger btn-sm'>Delete</button>
						</td>
						</tr>
						";
					}
						}
						else{
							?>
							<tr>
								<td align="center" colspan="11"> No Record Found </td>
							</tr>
							<?php
						}
					
					}
					mysqli_close($conn);
					?>

				</tbody>

			</table>

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

			<!-- CDN	 -->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</body>
		</html>