<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>My Profile Settings</title>
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
                    <a class="nav-link active text-light" aria-current="page" href="#"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                    
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
                <h1>My Profile Settings</h1>
            </div>
        </div>
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
                            
        ?>
        <hr>
        <br>
        <form action="profile_settings.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <!-- <div class="col-md-12 d-flex justify-content-center align-items-center flex-column"> -->
            <div class="col-md-12 d-flex flex-column">
                <div class="d-flex align-items-center">
                    <h5 class="profile-txt">Password</h5>
                    <input type="text" name="password" id="password" class="input-textbox" value= "<?php echo decryptthis($row['encrypt_password'],$key);?>">
                    
                </div>
                <br>
                <div class="d-flex align-items-center">
                    <h5 class="profile-txt">My Contact Number</h5>
                    <input type="text" name="contact" id="contact" class="input-textbox" value="<?php echo $row['contact_no'];?>">
                    
                </div>
                <br>
                <div><b><p style='margin-left:15px;'>Please Fill below fields if you are seeking for job.</p></b></div>
                <br>
                <div class="d-flex align-items-center">
                    <h5 class="profile-txt">Job Status</h5>
                    <input type="text" name="employment1" id="employment1" class="input-textbox" value="<?php echo $row['job_status'];?>">
                    <br>
                    
                </div>
                <br>
                <div class="d-flex align-items-center">
                    <h5 class="profile-txt">Special Skill</h5>
                    <input type="text" name="skill" id="skill" class="input-textbox" value="<?php echo $row['skill'];?>">
                    <br>
                </div>
                <!-- <div class="d-flex align-items-center">
                    <h5 class="profile-txt">Job Status</h5>
                    
                    <select name="employment" id="employment" class="input-textbox">
                        <option value="Un-Employed">Un-Employed</option>
                        <option value="Employed">Employed</option>
                      </select>
                    
                </div> -->
                <br>
                <div class="d-flex align-items-center">
                    
                    <input type="submit" name="btnSubmit" id="btnSumbit" class="btn btn-outline-primary profile-btn" value="Update">
                </div>
            </div> 
        </div>
</form>
<?php


				if(isset($_POST["btnSubmit"]))
				{
					
					$password = $_POST["password"];
                    $encrypt_password = encryptthis($password,$key);
					$contact = $_POST["contact"];
					$employment = $_POST["employment1"];
                    $skill = $_POST["skill"];
					
					
					
					

						$sql = "UPDATE `tbl_nic` SET `encrypt_password` = '".$encrypt_password."', `contact_no` = '".$contact."', `job_status` = '".$employment."', `skill` = '".$skill."' WHERE `tbl_nic`.`nic` ='".$_SESSION['nic']."'";

						if(mysqli_query($con,$sql))
						{
							echo      '<script type="text/javascript">
                                            window.location.href = "profile_settings.php";
                                        </script>';
				
						}
						else{
							
							echo "Opps !!! , Something Wrong Please Re-try...";
						}
					
				}
					
			
			?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   
</body>
</html>