<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>View Birth Certificate details</title>
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
                    <a class="nav-link active text-light" aria-current="page" href="dept_login.php"><i class="fa fa-sign-out" aria-hidden="true"></i></i>&nbsp;Logout</a>
                    
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


if(isset($_GET['nic']))
		{

            include_once('db_config.php');
			
            $sql = "SELECT * FROM tbl_nic t1 ,tbl_bc t2 WHERE t1.nic = t2.nic and t1.nic ='".$_GET['nic']."'";
				
		
		        $result = mysqli_query($con,$sql);
		  		if(mysqli_num_rows($result)>0)
				{
					
					while($row = mysqli_fetch_assoc($result)) 
					{
						
							echo '
                            <div class="container">
                            <div class="row">
                            <div class="col-md">
                            
                            
                            <table class="table table-borderless data-table table-hover d-flex justify-content-center align-items-center">
                            <br>
                            <h3 class="d-flex justify-content-center">Birth Certificate Details</h3>
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
							<td class="col-md"><b>Birth Certificate No : </b></td>
                            <td class="col-md">'.$row['bc_no'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Name : </b></td>
                            <td class="col-md">'.$row['name'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Gender : </b></td>
                            <td class="col-md">'.$row['gender'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Birth Place : </b></td>
                            <td class="col-md">'.$row['place'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Date : </b></td>
                            <td class="col-md">'.$row['dob'].'</td>
                            </tr>
                            <tr><td><h5>Details of Father</h5></td></tr>
                            <tr>
							<td class="col-md"><b>Full Name : </b></td>
                            <td class="col-md">'.$row['dad_full_name'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Date of Birth : </b></td>
                            <td class="col-md">'.$row['dad_dob'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Place : </b></td>
                            <td class="col-md">'.$row['dad_place'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Race : </b></td>
                            <td class="col-md">'.$row['dad_race'].'</td>
                            </tr>
                            <tr><td><h5>Details of Mother</h5></td></tr>
                            <tr>
							<td class="col-md"><b>Full Name : </b></td>
                            <td class="col-md">'.$row['mom_full_name'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Date of Birht : </b></td>
                            <td class="col-md">'.$row['mom_dob'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Place : </b></td>
                            <td class="col-md">'.$row['mom_place'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Race : </b></td>
                            <td class="col-md">'.$row['mom_race'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Were Parents Married : </b></td>
                            <td class="col-md">'.$row['married'].'</td>
                            </tr>
                            <tr>
							<td class="col-md"><b>Date of Registration : </b></td>
                            <td class="col-md">'.$row['date_of_reg'].'</td>
                            </tr>
                        <tbody>
						</table>
                        </div>
                        </div>
                        </div>';
						
					}
					
					
				}

        }

                // <th width="200px"><a href="update_products.php?id='.$row['productID'].'"><p><button class="pbutton">Update</button></p></a>
							// <form action="delete.php" method="post">
							// <input type="hidden" name="nic" value= '.$row['nic'].'>
							// <input type="submit" name="delete" value="Delete"></th>
						
				
		
		?>
        <button class="inadmin-view-btn" onclick="history.back()">Go Back</button>
                    
                </div>

            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
</body>
</html>