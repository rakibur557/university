<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CPIS-BD</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<!-- BOOTSTRAP FONT CDN -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

	<!-- AJAX CDN-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- dtable css link -->

<link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>



	<style type="text/css">
		.card{
			border-style: dashed;
			border-width: 2px;
			border-color: black;
			margin-top: 20px;
			margin-bottom: 20px;
			padding-top: 30px;
			padding-bottom: 30px;
			background-color: #fce4da;
		}
		.btnimp{
			background-color: #e67e22;
			color: white;
		}
		.btnimp:hover{
			background-color: #cf580a;
			color: white;
			border-color: #cf580a;
		}

		.btnimp:active{
			background-color: #cf580a;
			color: white;
			border-color: #cf580a;
		}
		.btnimp:focus{
			background-color: #cf580a;
			color: white;
			border-color: #cf580a;
		}
	</style>

</head>
<body>
	<!-- Navigation Bar Start-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<img src="virus.png" class="navbar-brand" alt="virus" height="40">
			<a class="navbar-brand fw-bold text-secondary" href="#">Covid Patient Information System</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Search Bar -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="form-inline d-flex ms-auto">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search_text">
				</div>

      <!-- Dropdown -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          	<!-- Dropdown person icon -->
            <i class="bi bi-person-fill"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Admin Profile</a></li>
            <li><a class="dropdown-item " href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
	<!-- Navigation Bar End -->



<!-- Delete PopUp Model -->
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
<!-- Delete Popup Model script -->
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











	<div class="container my-5 table-responsive">



		<h2 align="center">List of Patients</h2>

		<?php 
			include 'confiq.php';
			$sql_view = "SELECT * FROM patient_info, covid_info where patient_info.id = covid_info.id;";
			$res = mysqli_query($conn, $sql_view);
			$gender_m = 0;
			$gender_f = 0;
			$recovery = 0;
			$death = 0;
			$id = 0;

			while($row = mysqli_fetch_array($res)){
				if($row['death'] == 'Yes'){
				$death++;
			}
			if($row['recovery'] == "Yes"){
				$recovery++;
			}
			if($row['id']){
				$id++;
			}

			if($row['gender'] == "Male"){
				$gender_m++;
			}
			else{
				$gender_f++;
			}

			}
			echo "
			<div class='mb-2 mt-5'> 
				<p style='display: inline; margin-right: 20px;'>Total Patient: <b>$id</b></p>
				<p style='display: inline; margin-right: 25px;'>Male Patient: <b>$gender_m</b></p>
				<p style='display: inline; margin-right: 25px;'>Female Patient: <b>$gender_f</b></p>
				<p style='display: inline; margin-right: 20px;'>Recovery: <b>$recovery</b></p>
				<p style='display: inline; margin-right: 150px;'>Death: <b>$death</b></p>
				<a href='insert.php' style='display: inline; margin-right: 10px;' class='btn btn-success'>Add New</a>

				<a href='insert.php' style='display: inline; margin-right: 10px;' class='btn btnimp' data-bs-toggle='collapse' data-bs-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>Import</a>

				<form style='display: inline;' action='export.php' method='POST'>
				<input type='submit' name='export' value='Download' class='btn btn-primary'>			
				</form>
			</div>

			";
		?>

		<!-- Collaps Menu -->
		<div class="collapse" id="collapseExample">
  <div class="card card-body">
   <form action="importData.php" method="post" enctype="multipart/form-data">

   					<div class="row">
						  <div class="col-10">
						  	<input type="file" class="form-control" name="file" id="formFile">
						  </div>
						  <div class="col-2">
						  	<input type="submit" class="btn btn-secondary" name="importSubmit" value="Load Data">
						  </div>
						</div>
            
            


        </form>
  </div>
</div>


		<!-- Table -->
		<!-- <div id="dtable"> -->
		<table class="table table_data" id="datatableid">
			<thead class="table-dark">
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

				$total_pages_sql = "SELECT COUNT(*) FROM patient_info, covid_info where patient_info.id = covid_info.id;";
				$result = mysqli_query($conn,$total_pages_sql);
				$total_rows = mysqli_fetch_array($result)[0];
				$total_pages = ceil($total_rows / $no_of_records_per_page);

				$sql = "SELECT * FROM patient_info, covid_info where patient_info.id = covid_info.id LIMIT $offset, $no_of_records_per_page";
				$res_data = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($res_data)){

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

					<a href='/cpisbd/update.php?updateid=$row[id]' class='btn btn-warning btn-sm'>Edit</a>
					<button class='deletebtn btn btn-danger btn-sm'>Delete</button>
					</td>
					</tr>
					";
				}
				mysqli_close($conn);
				?>
			</tbody>
		</table>
		<!-- </div> -->

		<!-- Page Show -->
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<li class="page-item active <?php if($pageno <= 1){ echo 'disabled'; } ?>">
					<a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
					</li>

					<li class="page-item active"><a class="page-link" href="?pageno=1">First</a></li>

					<li class="page-item active <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
						<a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
						<li class="page-item active"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>

					</li>
				</ul>
			</nav>


			<!-- Chart -->
<?php
      include 'confiq.php';
      $sql_view = "SELECT * FROM `patient_data`;";
      $res = mysqli_query($conn, $sql_view);
      //$row = mysqli_fetch_assoc($res);
      // $name = $row['patient_name'];
      // $age = $row['age'];
      $gender_m = 0;
      $gender_f = 0;
      // $district = $row['area'];
      $recovery = 0;
      $death = 0;
      $id = 0;
      // $vaccinated = $row['vaccinated'];
      // $vaccine_name = $row['vaccine_name'];

      while($row = mysqli_fetch_array($res)){
        if($row['death'] == 'Yes'){
        $death++;
      }
      if($row['recovery'] == "Yes"){
        $recovery++;
      }
      if($row['id']){
        $id++;
      }

      if($row['gender'] == "Male"){
        $gender_m++;
      }
      else{
        $gender_f++;
      }

      }
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Patient', 'Life Status'],
          
          ['Total Affected',  <?php echo "$id"; ?>],
          ['Total Recovered',  <?php echo "$recovery"; ?>],
          ['Total Death',      <?php echo "$death"; ?>],
          ['Male Patient',  <?php echo "$gender_m"; ?>],
          ['Female Patient',  <?php echo "$gender_f"; ?>]


        ]);

        var options = {
          title: 'Corona Case in Bangladesh'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <div id='chart_div' align='center'>
    <div  id="piechart" style="width: 500px; height: 300px;"></div>
    </div>
<!-- Chart end -->
		</div>









		<!-- JS SARCH CODE -->
		<script type="text/javascript">
			$(document).ready(function(){
				$("#search_text").keyup(function(){
					var search = $(this).val();
					$.ajax({
						url:'action.php',
						method:'post',
						data:{query:search},
						success: function(response){
							$(".table_data").html(response);
						}
					});
				});
			});
		</script>	

		<!-- Table sorting script -->
		<script type="text/javascript">
    $(document).ready(function () {
    	$('#datatableid').DataTable();
		});
    </script>


		<!-- CDN	 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
	</html>