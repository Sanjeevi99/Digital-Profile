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
                  <label class="nav-link active text-light"><?php echo "Hi ! ".$_SESSION['username'];?></label>
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
                <h1>Dash Board</h1>
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

						
							
							
							

							$sql = "SELECT * FROM tbl_nic WHERE nic ='".$_SESSION['nic']."'";


							$results = mysqli_query($con,$sql);
							

     						$row = mysqli_fetch_assoc($results);
                            
							
							
						
                  
        echo '<div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                <img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" alt="boy_img" class="img-fluid user-img">
                <br>
                <h5>First Name Name : '.decryptthis($row['firstname'],$key).' </h5>
                <h5>Last Name : '.decryptthis($row['lastname'],$key).' </h5>
                <h5>NIC Number : '.$row['nic'].'</h5>
                <br>
            </div>'
            ?>
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                <br>
                <a href="my_digital_profile.php"><button class="inhome-btn">My Digital Profile</button>
                <br>
                <br>
                <a href="study_path.php"><button class="inhome-btn">Study Path Recommender</button></a>
                <br>
                <a href="digital_vcc_card.php"><button class="inhome-btn">My Digital Vaccination Card</button></a>
                <br>
                <a href="bc_home.php"><button class="inhome-btn">My Birth Certificate</button></a>
                <br>
                <a href="licence_home.php"><button class="inhome-btn">My Vehicle Licence</button></a>
                <br>
                <a href="profile_settings.php"><button class="inhome-btn">Profile Settings</button>
                <br>
                
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
</body>
</html>