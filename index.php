<?php 
session_start();


$page = isset( $_GET["page"] ) ? $_GET["page"] : "main";
$_SESSION['page'] = $page;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSU-Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php include "master/nav.php" ?>
        <?php 
       
                if( file_exists("pages/".$page."/view.php") ) {
                    echo '
                        <link rel="stylesheet" href="pages/'.$page.'/view.css">
                        <script src="pages/'.$page.'/view.js"></script>
                    ';
                    include "pages/".$page."/view.php";
                } else {
                    echo '
                        <link rel="stylesheet" href="pages/pagenotfound/view.css">
                        <script src="pages/pagenotfound/view.js"></script>
                    ';
                   
                }
            ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>


</html>