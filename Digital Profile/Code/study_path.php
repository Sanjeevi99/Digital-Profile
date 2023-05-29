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
    <title>Study Path Recommender</title>
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
            

                $sql = "SELECT * FROM tbl_nic t1 ,tbl_al_results t2 WHERE t1.nic = t2.nic and t1.nic = '".$_SESSION['nic']."' ";
                

                $result = mysqli_query($con,$sql);
                
                
	
				
					
					$row = mysqli_fetch_assoc($result);
					


        echo '<div class="row">
            
            <div class="col-md d-flex justify-content-center">
                <h1>Study Path Recommender</h1>
            </div>
            <hr>
            <br>
            
        </div>
        <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-5 d-flex flex-column">

            <h3>A/L Results</h3>
            <br>
              
                <input type="text" name="nic" class="data-input-textbox1" value='.$row['nic'].' placeholder="NIC Number">

                <div class="d-flex flex-row justify-content-between">
                <input type="text" name="fname" class="data-input-textbox1" value='.(decryptthis($row['firstname'],$key)).' placeholder="First Name">
                
                <input type="text" name="lname" class="data-input-textbox1" value='.(decryptthis($row['lastname'],$key)).' placeholder="Last Name">
                </div>
                
                <input type="text" name="dob" class="data-input-textbox1" value='.$row['year'].' placeholder="Year">

                <input type="text" name="address" class="data-input-textbox1" value='.$row['stream'].' placeholder="Stream">
                
                <input type="text" name="address" class="data-input-textbox1" value='.$row['indexnumber'].' placeholder="Index Number">
                

                <div class="d-flex flex-row justify-content-around">
                <h4>Subjects</h4>

                <h4>Results</h4>
              
                </div>
                
                <div class="d-flex flex-row justify-content-around">
                <input type="text" name="" class="data-input-textbox1" value='.$row['sub1'].' placeholder="Subject 1 Name">
                
                <input type="text" name="" class="result-textbox" value='.$row['result1'].' placeholder="Result 1">
                
                </div>
                
                <div class="d-flex flex-row justify-content-around">
                <input type="text" name="occupation" class="data-input-textbox1" value='.$row['sub2'].' placeholder="Subject 2 Name">
                
                <input type="text" name="occupation" class="result-textbox" value='.$row['result2'].' placeholder="Result 2">
                
                </div>
                
                <div class="d-flex flex-row justify-content-around">
                <input type="text" name="occupation" class="data-input-textbox1" value='.$row['sub3'].' placeholder="Subject 3 Name">
                
                <input type="text" name="occupation" class="result-textbox" value='.$row['result3'].' placeholder="Result 3">
                
                </div>
                
                <div class="d-flex flex-row justify-content-around ">
                <input type="text" name="occupation" class="data-input-textbox1" value="Genaral English">
                
                <input type="text" name="occupation" class="result-textbox" value='.$row['geneng'].'  placeholder="Results">
                
                </div>
                
                <div class="d-flex flex-row justify-content-around">
                <input type="text" name="occupation" class="data-input-textbox1" value="General Knowledge">
                
                <input type="text" name="occupation" class="result-textbox" value='.$row['gk'].'  placeholder="Results">
                
                </div>
                
            </div>
            
            <div class="col-md-7 d-flex flex-column align-items-center justify-content-center">
            <h2>Important Note :</h2>
            <p>This recommendation system is especially for those students who got low results and lost the chance to enter universities.</p>
            </div>';
                    
                    
                

            

            
        echo '</div>
      </form>
      <br>
      <br>
      <div class="row">
      <div class="col-md-12">
        <h3>Your Recommendations.</h3>
        <br>
      <br>

        <table class="table table-borderless data-table table-hover">
                                <thead class="thead-dark">
                                <tr>
                  <th class="col-md-3">Course Name</th>
                  <th class="col-md-2">Avalilable</th>
                  <th class="col-md-1">Duration</th>
                  <th class="col-md-8">Qualifications</th>
                  <th class="col-md-1">Medium</th>
                  
                </tr>
                            </thead>
                </table>';
                

        
                // $sql1 = "SELECT * FROM tbl_nic t1 ,tbl_al_results t2 WHERE t1.nic = t2.nic and t1.nic = '".$_SESSION['nic']."' ";
                $sql = "SELECT * FROM tbl_courses t1 ,tbl_al_results t2 WHERE t1.level = t2.level and t1.level ='".$row['level']."' and t2.nic ='".$_SESSION['nic']."' ";
                    
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0)
                {

                while($row = mysqli_fetch_assoc($result)) 
                {

                  echo '<table class="table table-borderless data-table table-hover">
                                <tbody>
                                <tr>
                  <td class="col-md-3">'.$row['course_name'].'</td>
                  <td class="col-md-2">'.$row['districts'].'</td>
                  <td class="col-md-1">'.$row['duration'].'</td>
                  <td class="col-md-8">'.$row['qualifications'].'</td>
                  <td class="col-md-1">'.$row['medium'].'</td>
                  <td class="col-md-1"><a href="http://dtet.gov.lk/en/collegesoftechnology/"><button class="small-btn"><i class="fa fa-arrow-right"></i></button></a></td>
                </tr>
                            <tbody>
                </table>';

                }
                }

        ?>
      </div>
      </div>
        
    </div>

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>