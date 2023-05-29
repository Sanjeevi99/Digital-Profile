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
    <title>Update Passport Profiles</title>
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
                    <a class="nav-link active text-light" aria-current="page" href="#"><i class="fa fa-home" aria-hidden="true"></i></i>&nbsp;Home</a>
                    
                  </li>
                  
                </ul>
                
              </div>
            </div>
          </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md">
                
                        <?php

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


if(isset($_GET['nic']))
		{

            include_once('db_config.php');
			
		    	 
            $sql = "SELECT * FROM tbl_nic t1 ,tbl_passport t2 WHERE t1.nic = t2.nic and t1.nic ='".$_GET['nic']."'";
		
		        $result = mysqli_query($con,$sql);
		  		if(mysqli_num_rows($result)>0)
				
					
					$row = mysqli_fetch_assoc($result);
					
						
							echo '
                            <div class="container">
                            <div class="row">
                            <div class="col-md">
                            
                            <form action="update_passport_profiles.php" method="post" enctype="multipart/form-data">
                            <br>
                            <h3 class="d-flex justify-content-center">Update Passport Details</h3>
                            <br>
                            <table class="table table-borderless data-table table-hover d-flex justify-content-center align-items-center">
                            <tbody>
                            <tr class="d-flex justify-content-center">
						    <td><img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" width="150px" height="auto"/></td>
                            </tr>
                            <tr>
							<td class="col-md"><b>NIC Number : </b></td>
                            <td class="col-md"><input type="text" name="nic1" id="nic1" class="data-input-textbox" value='.$row['nic'].' disabled>
                            <input type="text" name="nic" id="nic" class="data-input-textbox" value='.$row['nic'].' hidden></td>
                            </tr>
                            <tr>
							<td class="col-md"><b>First Name : </b></td>
                            <td class="col-md"><input type="text" name="firstname" id="firstname" class="data-input-textbox" value='.(decryptthis($row['firstname'],$key)).' disabled></td>
                            <td class="col-md"></td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Last Name : </b></td>
                            <td class="col-md"><input type="text" name="lastname" id="lastname" class="data-input-textbox" value='.(decryptthis($row['lastname'],$key)).' disabled></td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Passport No : </b></td>
                            <td class="col-md"><input type="text" name="passport_no" id="passport_no" class="data-input-textbox" value='.$row['passport_no'].' required></td>
                            
                            </tr>
                            <tr>
							<td class="col-md"><b>Issued Date : </b></td>
                            <td class="col-md"><input type="text" name="issued" id="issued" class="data-input-textbox" value='.$row['issued'].' required></td>
                            
                            </tr>
                            <tr>
							<td class="col-md"><b>Expiry Date : </b></td>
                            <td class="col-md"><input type="text" name="expiry" id="expiry" class="data-input-textbox" value='.$row['expiry'].' required></td>
                            
                            </tr>

                        <tbody>
						</table>
                        <input type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-outline-primary profile-btn" value="Update Passport Details">
                        </form>
                        </div>
                        </div>
                        </div>';
						
					
					
					
				

        }

        

                // <th width="200px"><a href="update_products.php?id='.$row['productID'].'"><p><button class="pbutton">Update</button></p></a>
							// <form action="delete.php" method="post">
							// <input type="hidden" name="nic" value= '.$row['nic'].'>
							// <input type="submit" name="delete" value="Delete"></th>
                            

                            if(isset($_POST["btnUpdate"]))
                            {
                                
                                $nic = $_POST['nic'];
                                $passport_no = $_POST['passport_no'];
                                $issued = $_POST['issued'];
                                $expiry = $_POST['expiry'];
                                
                            
                                
                                
                                
                                $con = mysqli_connect("localhost","root","","digitalprofiledb");
                            
                                    if(!$con)
                                    {
                                        die("Sorry, We are facing a Technical Issue");
                                    }
                                    else{
                                        echo"";
                                    }
                                
                            
                                    $sql = "UPDATE `tbl_passport` SET `passport_no` = '".$passport_no."', `issued` = '".$issued."', `expiry` = '".$expiry."' WHERE `tbl_passport`.`nic` ='".$nic."'";
                            
                                    if(mysqli_query($con,$sql))
                                    {
                                        echo      '<script type="text/javascript">
                                                        window.location.href = "view_passport_profiles.php";
                                                    </script>';
                            
                                    }
                                    else{
                                        
                                        echo "Opps !!! , Something Wrong Please Re-try...";
                                    }
                                
                            }
						
				
		
		?>
        <br>
        <button class="btn btn-outline-primary profile-btn" onclick="history.back()">Go Back</button>
        


        
                    
                </div>

            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
</body>
</html>