<?php
include("auth.php");    //include auth.php file on all secure pages
include("db.php");
include("topnav.php");
include("footer.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Scribble</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
</head>
<body>
    <div class="logform">
        <h1><?php echo $_SESSION['username']; ?>'s Scribble</h1>
        <form name="logentry" action="newlog.php" method="post">
            <textarea class="logarea" cols="80" rows="10" name="log" placeholder="Scribble your thoughts"></textarea>
            <br />
            <input type="radio" name="choice" value="entry"><label for="entry">Log</label>
            <input type="radio" name="choice" value="note" checked><label for="note">Scribble</label>
            <input type="submit" name="submit" value="Finish" />
        </form>
    </div>
    <div class="logs">
        <?php
                
        $query = "SELECT * FROM note ORDER BY id DESC";  //Select  query execution
            if($result = mysqli_query($con, $query)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td class='tlog'>" . $row['log_time'] . "</td>";
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