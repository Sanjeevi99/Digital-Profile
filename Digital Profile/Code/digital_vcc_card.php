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
    <title>My Digital Vaccination Card</title>
</head>
<body onload="visibility()">
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
        <br>
        <div class="row">
            <div class="col-md d-flex justify-content-center align-items-center flex-column">
                <h1>My Digital Vaccination Card</h1>
            </div>
        </div>
        <hr>
        <br>
        <?php


include_once('db_config.php');

$key = 'qkwjdiw239&&jdafweihbrhnan&^%';

function decryptthis($data,$key){
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    return openssl_decrypt($encrypted_data, 'AES-256-CBC', $encryption_key, 0, $iv);
}

// $sql = "SELECT * FROM tblVaccination t1 ,tbl_AL_results t2 WHERE t1.NICNumber = t2.NICNumber ";
// $sql = "SELECT * FROM tbl_Vaccine t1  WHERE t1.NICNumber = ";

$sql = "SELECT * FROM tbl_vaccine t1 ,tbl_nic t2 WHERE t1.nic = t2.nic and t1.nic = '".$_SESSION['nic']."' ";


$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{

$row = mysqli_fetch_assoc($result)


?> 
        <form onsubmit="return false">
            <div class="form-element">
                
                <input type="text" id="name" value="<?php echo (decryptthis($row['firstname'],$key));?>" hidden/>
            </div>
            <div class="form-element">
                
                <input type="text" id="NIC" value="<?php echo $row['nic'];?>" hidden/>
            </div>
            <div class="form-element">
                
                <input type="text" id="Vaccination" value="<?php echo $row['no_of_vacc_taken'];?>" hidden />
            </div>
            <div class="form-element">
                
                <input type="text" id="vacc1_name" value=<?php echo $row['vacc1_name'];?> hidden/>
            </div>
            <div class="form-element">
                
                <input type="text" id="vacc2_name" value=<?php echo $row['vacc2_name'];?> hidden/>
            </div>
            <div class="form-element">
                
                <input type="text" id="vacc3_name" value=<?php echo $row['vacc3_name'];?> hidden/>
            </div>
            
        </form>
        <?php }
		  
		  ?>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">
                <button type="button" class="btn btn-outline-primary" onclick="myFunction(); generateCard()">Generate Digital Vaccination Card</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">
                <div id="Card" class="container1 d-flex justify-content-center">
                    <div class="padding">
                        <div class="font">
                            <div class="top d-flex justify-content-center">
                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/>' ?>
                            </div>
                            <div class="bottom">
                                <div class="general-information">
                                    <div class="card-element card-name">
                                        <br>
                                        <span>Name:</span>
                                        <span id="Name"></span>
                                    </div>
                                    
                                    <div>
                                        <span>NIC Number:</span>
                                        <span id="NICNumber"></span>
                                    </div>
                                    
                                    <div>
                                        <span>Number of Vaccine Taken:</span>
                                        <span id="Vaccine"></span>
                                    </div>
                                    
                                    <div>
                                        <span>Generated Date:</span>
                                        <span id="cardDate"></span>
                                    </div>
                                    
                                    <div>
                                        <span>Generated Time:</span>
                                        <span id="cardTime"></span>
                                    </div>
                                    <div class="right">
                                        <div class="colorbox">
                                            <div id="colortag">
                            
                                            </div>
                                            <div  class="qr-code">
                                                <img id="img" src="" alt="qr-code">
                                              </div>
                                        </div>
                                    </div>
                                    
                                    
                                    </div>
                            </div>
                        </div>
                        
            
                    </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 
    <script src="digital_vacc_card1.js"></script>  
</body>
</html>