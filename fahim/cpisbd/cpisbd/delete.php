<?php
$conn = mysqli_connect("localhost", "root", "", "practice");


if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE patient_info, covid_info FROM patient_info inner join covid_info on patient_info.id = covid_info.id and patient_info.id=$id;";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:/cpisbd/home.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}
$conn = mysqli_connect("localhost", "root", "", "practice");


if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query1 = "DELETE patient_info, covid_info FROM patient_info inner join covid_info on patient_info.id = covid_info.id and patient_info.id=$id;";
    $query_run1 = mysqli_query($conn, $query);

    $query2 = "DELETE FROM patient_data WHERE id=$id;";
    $query_run2 = mysqli_query($conn, $query2);

    if($query_run1)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:/cpisbd/home.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>