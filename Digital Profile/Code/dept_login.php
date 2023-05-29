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
                    <a class="nav-link active text-light" aria-current="page" href="dept_login.php">Log In</a>
                  </li>
                </ul>
                
              </div>
            </div>
          </nav>
    </header>
    <div class="container log-container">
        <div class="row">
            
            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">
                <h2> Department Login</h2>
                <br>
                <form method="post" action="">
                    <div class="form-input">
                        
                        <input class="login-fld" type="text" name="txtnicnumber" placeholder="Department ID" required>
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
                            
							
							if( $username == "dept_health" && $pass == "dept_health" )
							{
								
								echo      '<script type="text/javascript">
                                                        window.location.href = "view_vaccinated_profiles.php";
                                                    </script>';
							}
							

                            if( $username == "dept_education" && $pass == "dept_education" )
							{
								
								echo      '<script type="text/javascript">
                                                        window.location.href = "view_education_profiles.php";
                                                    </script>';
							}
							

                            if( $username == "dept_licence" && $pass == "dept_licence" )
							{
								
								echo      '<script type="text/javascript">
                                                        window.location.href = "view_licence_profiles.php";
                                                    </script>';
							}
							

                            if( $username == "dept_nic" && $pass == "dept_nic" )
							{
								
								echo      '<script type="text/javascript">
                                                        window.location.href = "nic_dept_home.php";
                                                    </script>';
							}
							

                            if( $username == "dept_bc" && $pass == "dept_bc" )
							{
								
								echo      '<script type="text/javascript">
                                                        window.location.href = "view_bc_profiles.php";
                                                    </script>';
							}
							

                            if( $username == "dept_passport" && $pass == "dept_passport" )
							{
								
								echo      '<script type="text/javascript">
                                                        window.location.href = "view_passport_profiles.php";
                                                    </script>';
							}
							else
							{
                                echo '<div class="alert alert-danger">
                            <strong>Login Fail!</strong> Incorrect Department ID or Password.
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