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
    <title>Birth Certificate Profiles</title>
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
                <br>
                <h1>Birth Certificate Profiles</h1>
                <hr>
                <br>
                <form action="view_vaccinated_profiles.php" method="post" enctype="multipart/form-data">
                <div class="container d-flex flex-row">
                    <input class="search-bar" type="text" name="search-val" id="search-val" style="font-family: FontAwesome;" placeholder='&#xf002  Search Vaccinated Profiles'>
                    <!-- <button style="font-family: FontAwesome;" class="search-btn">&#xf002</button> -->
                    <input type="submit" name="btn-search" id="btn-search" style="font-family: FontAwesome;" class="search-btn" value="&#xf002">
                </div>
                </form>
                <br>
                <div class="container data-table">
                    <table class="table table-borderless">
                        <tr>
                            <th class="col-md-2"><h6>Image</h6><hr></th>
                            <th class="col-md-1"><h6>NIC No.</h6><hr></th>
                            <th class="col-md-1"><h6>Name</h6><hr></th>
                            <th class="col-md-1"><h6>Bith Certificate No</h6><hr></th>
                            <th class="col-md-3"><h6>Actions</h6><hr></th>

                        </tr>
                    </table>
                        <?php

$key = 'qkwjdiw239&&jdafweihbrhnan&^%';

function decryptthis($data,$key){
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    return openssl_decrypt($encrypted_data, 'AES-256-CBC', $encryption_key, 0, $iv);
}
            include_once('db_config.php');
			
            if(isset($_POST["btn-search"]))
				{
					$search_value = $_POST["search-val"];
					
				

                    $sql = "SELECT * FROM tbl_nic t1 ,tbl_bc t2 WHERE t1.nic = t2.nic and t1.nic ='".$search_value."'";

                    $result1 = mysqli_query($con,$sql);
		  		if(mysqli_num_rows($result1)>0)
				{
					
					while($row1 = mysqli_fetch_assoc($result1)) 
					{
						
							echo '<table class="table table-borderless data-table table-hover">
                            <tbody>
                            <tr>
						    <td class="col-md-2"><img src="data:image/jpeg;base64,'.base64_encode( $row1['img'] ).'" width="70px" height="auto"/></td>
							<td class="col-md-1">'.$row1['nic'].'</td>
							<td class="col-md-1">'.$row1['name'].'</td>
                            <td class="col-md-1">'.$row1['bc_no'].'</td>
                            
                            <td class="col-md-1"><a href="view_vaccinated_details.php?nic='.$row1['nic'].'"><button class="inadmin-view-small-btn"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; View</button></td>
                            <td class="col-md-1"><a href="update_bc_profiles.php?nic='.$row['nic'].'"><button class="inadmin-edit-small-btn"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Update</button></td>
                            <td class="col-md-1"><a href="view_profiles.php?nic='.$row1['nic'].'"><button class="inadmin-view-small-btn"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp; NIC</button></td>
						</tr>
                        <tbody>
						</table>';
						
					}
					
					
				}else{
                    echo "<h3 style='color:red;'> No Licence Profile Available ! </h3>";
                }

						if(mysqli_query($con,$sql))
						{
							
                        //   echo      '<script type="text/javascript">
                        //         window.location.href = "profile_validation_page.php";
                        //         </script>';

							
						}
						else{
							
							echo "Opps !!! , Something Wrong Please Re-try...";
						}
					
				}

                echo '<hr>';
	
		    
		    	$sql = "SELECT * FROM tbl_nic t1 ,tbl_bc t2 WHERE t1.nic = t2.nic"; 
				
		
		        $result = mysqli_query($con,$sql);
		  		if(mysqli_num_rows($result)>0)
				{
					
					while($row = mysqli_fetch_assoc($result)) 
					{
						
							echo '<table class="table table-borderless data-table table-hover">
                            <tbody>
                            <tr>
						    <td class="col-md-2"><img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" width="70px" height="auto"/></td>
							<td class="col-md-1">'.$row['nic'].'</td>
							<td class="col-md-1">'.$row['name'].'</td>
                            <td class="col-md-1">'.$row['bc_no'].'</td>
                            <td class="col-md-1"><a href="view_bc_details.php?nic='.$row['nic'].'"><button class="inadmin-view-small-btn"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; View</button></td>
                            <td class="col-md-1"><a href="update_bc_profiles.php?nic='.$row['nic'].'"><button class="inadmin-edit-small-btn"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Update</button></td>
                            <td class="col-md-1"><a href="view_profiles.php?nic='.$row['nic'].'"><button class="inadmin-view-small-btn"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp; NIC</button></td>
						</tr>
                        <tbody>
						</table>';
						
					}
					
					
				}

                // <th width="200px"><a href="update_products.php?id='.$row['productID'].'"><p><button class="pbutton">Update</button></p></a>
							// <form action="delete.php" method="post">
							// <input type="hidden" name="nic" value= '.$row['nic'].'>
							// <input type="submit" name="delete" value="Delete"></th>
						
				
		
		?>
                    
                </div>

            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
</body>
</html>


 