<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Department for Registration of Persons</title>
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
                    <a class="nav-link active text-light" aria-current="page" href="#"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                    
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
            if(isset($_POST['btnSubmit'])){
                $nic = $_POST['nic'];
                $hash_password = password_hash($nic, PASSWORD_BCRYPT);
                $encrypt_password = encryptthis($nic,$key);
                
                $fname = $_POST['fname'];
                $fname = encryptthis($fname,$key);
                $lname = $_POST['lname'];
                $lname = encryptthis($lname,$key);
                $dob = $_POST['dob'];
                $dob = encryptthis($dob,$key);
                $address = $_POST['address'];
                $address = encryptthis($address,$key);
                $occupation = $_POST['occupation'];
                $occupation = encryptthis($occupation,$key);
                $contact_no = 'None';
                $job_status = 'Un-Employed';

                $image = addslashes(file_get_contents($_FILES['userimage']['tmp_name']));


                // echo '<p>Name :'.$name.'</p>';
                // echo '<p>Email :'.$email.'</p>';
                // $dname =decryptthis($name,$key);
                // $demail =decryptthis($email,$key);
                // echo '<p>Name :'.(decryptthis($name,$key)).'</p>';
                // echo '<p>Email :'.$demail.'</p>';

                $sql = "INSERT INTO `tbl_nic` (`nic`, `firstname`, `lastname`, `dob`, `address`, `occupation`, `img`, `hash_password`, `encrypt_password`,
                `contact_no`, `job_status`) 
                VALUES ('".$nic."', '".$fname."', '".$lname."', '".$dob."', '".$address."', '".$occupation."', '".$image."', '".$hash_password."',
                '".$encrypt_password."', '".$contact_no."', '".$job_status."' );";

                if(mysqli_query($con,$sql))
						{
							echo '<div class="alert alert-success">
                            <strong>Success!</strong> User Added Successfully.
                          </div>';
						}
						else{
							
							echo "Opps !!! , Something Wrong Please Re-try...";
						}
            }

            ?>



        <div class="row">
            
            <div class="col-md d-flex justify-content-center">
                <h1>Department of Health- Enter Vaccination Details</h1>
            </div>
            <hr>
            <br>
            <br>
            <br>
        </div>
        <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8 d-flex flex-column">
              
                <input type="text" name="nic" class="data-input-textbox" placeholder="NIC Number">
                <br>
                <input type="text" name="district" class="data-input-textbox" placeholder="District">
                <br>
                <input type="text" name="gs_division" class="data-input-textbox" placeholder="GS Division">
                <br>
                <input type="text" name="vacc1_name" class="data-input-textbox" placeholder="Vaccine 1 Name">
                <br>
                <input type="text" name="vacc1_date" class="data-input-textbox" placeholder="Date of Vaccination 1">
                <br>
                <input type="text" name="vacc1_place" class="data-input-textbox" placeholder="Place of Vaccination 1">
                <br>
                <input type="text" name="vacc2_name" class="data-input-textbox" placeholder="Vaccine 2 Name">
                <br>
                <input type="text" name="vacc2_date" class="data-input-textbox" placeholder="Date of Vaccination 2">
                <br>
                <input type="text" name="vacc2_place" class="data-input-textbox" placeholder="Place of Vaccination 2">
                <br>
                <input type="text" name="vacc3_name" class="data-input-textbox" placeholder="Vaccine 3 Name">
                <br>
                <input type="text" name="vacc3_date" class="data-input-textbox" placeholder="Date of Vaccination 3">
                <br>
                <input type="text" name="vacc3_place" class="data-input-textbox" placeholder="Place of Vaccination 3">
                <br>
                
            </div>

            <div class="col-md-4 d-flex justify-content-center">
                <button name="btnSubmit" class="main-btn">Enter Details</button>
                <button class="sub-main-btn">Clear Data</button>
            </div>
        </div>
      </form>
        
    </div>

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>