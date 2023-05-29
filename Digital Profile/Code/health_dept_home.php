<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Department of Health</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary ">
            <div class="container">
              <a class="navbar-brand text-light" href="#">Digital ID</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                    
                  </li>
                  
                </ul>
                
              </div>
            </div>
          </nav>
    </header>
    <div class="container">
        <div class="row">
            
            <div class="col-md d-flex justify-content-center">
                <h1>Department of Health</h1>
            </div>
            <hr>
            <br>
        </div>
        <div class="row flex-column">
            <div class="col-md d-flex justify-content-center">
                <h3>Number of Vaccination Profiles in this Department</h3>
                <br>
                <br>
            </div>
            <br>
                
            <?php

                        include_once('db_config.php');
							// $sql = "SELECT * FROM tbl_nic t1, tbl_vaccine t2, tbl_al_results t3 WHERE t1.nic = t2.nic and t1.nic = t2.nic and t2.nic '".$_SESSION['nic']."'";
                            $sql = "SELECT * FROM tbl_vaccine";

							$results = mysqli_query($con,$sql);
							
     						$row = mysqli_fetch_assoc($results);

                            $val = mysqli_num_rows($results);
     

            ?>

            <div class="col-md d-flex justify-content-center">
                
                <h1><?php echo $val;?></h1>
            </div>
            <br>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                <a href="enter_vacc_details.php"><button class="inhome-btn">Enter Vaccination Details</button></a>
                <br>
                <br>
                <br>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
            <a href="profile_validation_page.php"><button class="inhome-btn">Verify Digital Profiles</button></a>
            </div>
        </div>
    </div>

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>