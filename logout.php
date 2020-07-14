<?php
session_start();

if(session_destroy())   //Destroying all Sessions
{
    header("Location: login.php");
}
?>