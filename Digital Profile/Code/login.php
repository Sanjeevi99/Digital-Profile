<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Digital ID | Login</title>
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
                    <a class="nav-link active text-light" aria-current="page" href="#">Log In</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="#">What is Digital ID ?</a>
                  </li>
                </ul>
                
              </div>
            </div>
          </nav>
    </header>
    <div class="container log-container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-end">
                <img src="Images\login_img.png" alt="login_img" class="img-fluid">
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                <h2>Welcome</h2>
                <br>
                <form method="post" action="">
                    <div class="form-input">
                        
                        <input class="login-fld" type="text" name="txtnicnumber" placeholder="NIC Number" required>
                    </div>
                    <br>
                    <div class="form-input">
                        
                        <input class="login-fld" type="password" name="txtpassword" placeholder="Password" required>
                    </div>
                    <br>
                    <br>
            
                <!-- Login Button -->
                <div class="mb-3 d-flex justify-content-center align-items-center flex-column"> 
                        <button type="submit" name="btnSubmit" class="login-btn">Login</button>
                    </div>
                  
            </div>
                </form>

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

						if(isset($_POST["btnSubmit"]))
						{
							$username = $_POST['txtnicnumber'];
							$pass = $_POST['txtpassword'];
                            
							
							
							

							$sql = "SELECT * FROM `tbl_nic` WHERE `nic`='".$username."';";

							$results = mysqli_query($con,$sql);
							

     						$row = mysqli_fetch_assoc($results);
                            $db_pass = decryptthis($row['encrypt_password'],$key);
                            
                            
							
							if( $db_pass == $pass)
							{
								
								$_SESSION['username'] = decryptthis($row['firstname'],$key);
								$_SESSION['nic'] = $row['nic'];
								
								header('Location:home.php');


							}
							else
							{
								// echo ("Incorrect NIC Number or Password !");
                                echo '<div class="alert alert-danger">
                            <strong>Login Fail!</strong> Incorrect NIC Number or Password.
                          </div>';

                          
                                
                                

							}
						}
                  ?>
            </div>
        </div>
    </div>
    

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
</body>
</html>