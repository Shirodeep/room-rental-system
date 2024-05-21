 <?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    // $uname = $_SESSION["uname"]
    ?>

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo 'RRS' ?></title>
     <!-- for bootstrap cdn-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <!-- Option 1: Include in HTML  icon link-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     <link rel="stylesheet" href="/public/style.css">
     <!-- for jquery cdn-->
     <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- khalti web sdk -->
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    </head>
 <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">


    <a class="navbar-brand col-lg-6" href="../../index.php" style="font-weight: 20px;font-size:40px;font-family: 'Lucida Console', Courier, monospace;">   RRS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse col-lg-6" id="navbarSupportedContent" >
         <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                 <a class="nav-link navigation" href="../../index.php">Home</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link navigation" href="/includes/about.php">About Us</a>
             </li>
             
         </ul>
         <div class="navbar-nav mr-auto">

             <?php
            if (empty($_SESSION["uname"])) {
                echo '<div class="navbar-nav ">
                <a href="/includes/login.php" class="btn btn-outline-success my-2 my-sm-0" type="button">Login</a>
                <a href="/includes/register.php"class="btn btn-outline-secondary my-2 my-sm-0" type="button">SignUp</a>
                </div>';
            } else {
                
                ?>
             <div class="dropdown" style="position:relative">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person-circle"></i><?php echo $_SESSION["uname"] ?>
                </button>
                <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton" style="position:static">
                    <a class="dropdown-item" href="/includes/profile.php">
                        <i class="bi bi-person-circle"></i>Profile
                    </a>
                    <a class="dropdown-item" href="/includes/settings.php">settings</a>
                    <a class="dropdown-item" href="/includes/logout.php">LogOut</a>
                </div>
            </div>
            <?php   }
            ?>
            </div>
     </div>

 </nav>