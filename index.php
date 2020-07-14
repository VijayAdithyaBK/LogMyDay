<?php
include("auth.php");    //include auth.php file on all secure pages
include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="head">
        <header><a href="logout.php">Logout</a></header>
    </div>
    <div class="logform">
        <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
        <form name="logentry" action="newlog.php" method="post">
            <textarea cols="80" rows="8" name="log" placeholder="Enter todays Log"></textarea>
            <input type="submit" name="submit" value="Finish" />
        </form>
    </div>
    <div class="logs">
        <?php
        
        $query = "SELECT * FROM logentry";  //Select  query execution
            if($result = mysqli_query($con, $query)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['log_time'] . "</td>";
                            echo "<td>" . $row['log'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_free_result($result);    //Free result
                }
                else{
                    echo "No log entry to show.";
                }
            }
            else{
                echo "ERROR: Could not able to execute $sql." . mysqli_error($con);
            }
        mysqli_close($con); //Close connection
        ?>
    </div>
</body>
</html>