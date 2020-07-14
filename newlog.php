<?php
include("db.php");
session_start();

$log = mysqli_real_escape_string($con,$_REQUEST['log']);
$log_time = date("Y-m-d H:i:s");

$query = "INSERT INTO logentry (log_time, log) VALUES ('$log_time', '$log')";

if(mysqli_query($con, $query)){
    header('Location: index.php');
}
else{
    echo "ERROR: Could not able to execute $query.".mysqli_error($con);
}

mysqli_close($con);
?>