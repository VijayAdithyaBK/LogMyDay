<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/topnav.css" />
</head>
<body>
    <div class="topnav">
        <a href="index.php" class="active">Home</a>
        <a href="note.php">Scribble</a>
        <div class="dropdown" onclick="myFunction()">
            <button class="dropbtn"><?php echo $_SESSION['username']; ?><i class="fas fa-user-circle"></i></button>
            <div class="dropdown-content" id="myDropdown">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    
    <script>
        function myFunction(){
            document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function(e){
            if(!e.target.matches('.dropbtn')){
                var myDropdown = document.getElementById("myDropdown");
                if(myDropdown.classList.contains('show')){
                    myDropdown.classList.remove('show');
                }
            }
        }
    </script>
</body>
</html>