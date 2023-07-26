<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login");
    }

    $username = $_SESSION["user"];
?>

<!doctype html>
    <html lang="en">
    <head>        
        <title>Laundry Crafty</title>
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/sidebar.css">        
    </head>
    <body> 

    <?php include ('./view/header.php') ?>
        <!-- Wrapper -->
        <div id="wrapper">            


            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="homepage">
                                <div class="text-center">
                                    <h2>Welcome to Laundry Crafty</h2>
                                    <p>
                                        Halo <b><?php echo $username;?></b>, Selamat datang di Laundry Crafty :]
                                        <br />Sebuah web apps sederhana yang berfungsi untuk melakukan pendataan laundry
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->               

        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        ?>

        <script src="js/jquery-1.12.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>