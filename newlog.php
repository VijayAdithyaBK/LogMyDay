<?php
include("db.php");
session_start();

date_default_timezone_set('Asia/Calcutta');

$log = mysqli_real_escape_string($con,$_REQUEST['log']);
$choice = mysqli_real_escape_string($con,$_REQUEST[ 'choice']);
$log_time = date("Y-m-d H:i:s");

$query = "INSERT INTO $choice (log_time, log) VALUES ('$log_time', '$log')";

if(mysqli_query($con, $query)){
    header('Location: index.php');
}
else{
    echo "ERROR: Could not able to execute $query.".mysqli_error($con);
}

mysqli_close($con);
?>