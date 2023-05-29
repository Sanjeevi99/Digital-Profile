<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>My Home</title>
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
                    <a class="nav-link active text-light" aria-current="page" href="home.php"><i class="fa fa-home"></i>&nbsp;Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                  </li>
                  
                  
                </ul>
                
              </div>
            </div>
          </nav>
    </header>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md d-flex justify-content-center align-items-center flex-column">
                <h1>My Digital Profile</h1>
            </div>
        </div>
        <hr>
        <br>
        <?php

                        include_once('db_config.php');

                        $key = 'qkwjdiw239&&jdafweihbrhnan&^%';

                        function encryptthis($data,$key){
                            $encryption_key = base64_decode($key);
                            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
                            $encrypted = openssl_encrypt($data,'AES-256-CBC',$encryption_key,0,$iv);
                            return base64_encode($encrypted . '::' . $iv);
                        }

                        function decryptthis($data,$key){
                            $encryption_key = base64_decode($key);
                            list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
                            return openssl_decrypt($encrypted_data, 'AES-256-CBC', $encryption_key, 0, $iv);
                        }

						
							
							
							

							// $sql = "SELECT * FROM tbl_nic t1, tbl_vaccine t2, tbl_al_results t3 WHERE t1.nic = t2.nic and t1.nic = t2.nic and t2.nic '".$_SESSION['nic']."'";
                            $sql = "SELECT * FROM tbl_nic t1, tbl_vaccine t2, tbl_al_results t3, tbl_licence t4, tbl_passport t5 WHERE t1.nic = t2.nic and t1.nic = t3.nic and t1.nic = t4.nic and t1.nic = t5.nic and t1.nic ='".$_SESSION['nic']."'";

							$results = mysqli_query($con,$sql);
							

     						$row = mysqli_fetch_assoc($results);
                            
							
							
						
                  
        echo '<div class="row">
        
        <div class="col-md-12 d-flex flex-row">
        
        <div class="col-md-4 d-flex flex-column "></div>
            <div class="col-md-4 d-flex flex-column ">
            <div class="col-md-12 d-flex align-items-center justify-content-around">
            <img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" alt="boy_img" class="img-fluid user-img">
            </div>
            <br>
            <div><h4>National Identicard Details</h4>
                        <hr>
                
                <h6>NIC Number : '.$row['nic'].'</h6>
                <h6>First Name Name : '.decryptthis($row['firstname'],$key).' </h6>
                <h6>Last Name : '.decryptthis($row['lastname'],$key).' </h6>
                <h6>Dateof Birth : '.decryptthis($row['dob'],$key).' </h6>
                <h6>Address : '.decryptthis($row['address'],$key).' </h6>
                <h6>Occupation : '.decryptthis($row['occupation'],$key).' </h6>
                <br>
            </div>
                <br>
            <div ><h4>Division Details</h4>
                        <hr>
                <h6>District : '.$row['district'].'</h6>
                <h6>GS Division : '.$row['gs_division'].' </h6
                <h6>Address : '.decryptthis($row['address'],$key).' </h6>
                <br>
            </div>    
                <br>
            
            <div ><h4>Passport Details</h4>
                        <hr>
                <h6>Passport Number : '.$row['licence_no'].'</h6>
                <h6>Issued Date : '.$row['issued'].' </h6>
                <h6>Expiry Date : '.$row['expiry'].' </h6>
                <br>
            </div>
            <br>
            <div ><h4>Advance Level Examination Details</h4>
                        <hr>
                <h6>Examination Year : '.$row['year'].'</h6>
                <h6>Index Number : '.$row['indexnumber'].' </h6>
                <h6>Stream : '.$row['stream'].' </h6>
                <h6>'.$row['sub1'].' : '.$row['result1'].' </h6>
                <h6>'.$row['sub2'].' : '.$row['result2'].' </h6>
                <h6>'.$row['sub3'].' : '.$row['result3'].' </h6>
                <h6>General English : '.$row['geneng'].' </h6>
                <h6>General Knowledge : '.$row['gk'].' </h6>
                <br>
            </div> 
            <br>
            <div class="col-md-4 d-flex flex-column "></div>   
        </div>'
            ?>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
</body>
</html>