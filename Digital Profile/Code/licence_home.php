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
    <title>View Profiles</title>
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
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
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

function decryptthis($data,$key){
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    return openssl_decrypt($encrypted_data, 'AES-256-CBC', $encryption_key, 0, $iv);
}



		

            include_once('db_config.php');
			
            $sql = "SELECT * FROM tbl_nic t1 ,tbl_licence t2 WHERE t1.nic = t2.nic and t1.nic ='".$_SESSION['nic']."'";
				
		
		        $result = mysqli_query($con,$sql);
		  		
				
					
				$row = mysqli_fetch_assoc($result);
				
						
							echo '
                            <div class="container">
                            <div class="row">
                            <div class="col-md">
                            
                            
                            <table class="table table-borderless data-table table-hover d-flex justify-content-center align-items-center">
                            <br>
                            <h3 class="d-flex justify-content-center">Vehicle Licence Details</h3>
                            <br>
                            <tbody>
                            <tr class="d-flex justify-content-center">
						    <td><img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" width="150px" height="auto"/></td>
                            </tr>
                            <tr>
							<td class="col-md"><b>NIC Number : </b></td>
                            <td class="col-md">'.$row['nic'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>First Name : </b></td>
                            <td class="col-md">'.(decryptthis($row['firstname'],$key)).'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Last Name : </b></td>
                            <td class="col-md">'.(decryptthis($row['lastname'],$key)).'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Licence No : </b></td>
                            <td class="col-md">'.$row['licence_no'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Issued Date : </b></td>
                            <td class="col-md">'.$row['issued'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Expiry Date : </b></td>
                            <td class="col-md">'.$row['expiry'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Blood Group : </b></td>
                            <td class="col-md">'.$row['blood_grp'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Allowed Vehicles : </b></td>
                            <td class="col-md">'.$row['allowed_vehicles'].'</td>
                            </tr>
                        <tbody>
						</table>
                        </div>
                        </div>
                        </div>';
						
					
					
					
				

        

                // <th width="200px"><a href="update_products.php?id='.$row['productID'].'"><p><button class="pbutton">Update</button></p></a>
							// <form action="delete.php" method="post">
							// <input type="hidden" name="nic" value= '.$row['nic'].'>
							// <input type="submit" name="delete" value="Delete"></th>
						
				
		
		?>
        <button class="inadmin-view-btn" onclick="history.back()">Go Back</button>
        <br>
        <br>
                    
                </div>

            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
</body>
</html>