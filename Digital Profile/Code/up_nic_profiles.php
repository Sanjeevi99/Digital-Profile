<?php
if(isset($_POST["btnUpdate"]))
{
    
    $nic = $_POST['nic'];
    $fname = $_POST['firstname'];
    $fname = encryptthis($fname,$key);
    $lname = $_POST['lastname'];
    $lname = encryptthis($lname,$key);
    $dob = $_POST['dob'];
    $dob = encryptthis($dob,$key);
    $address = $_POST['address'];
    $address = encryptthis($address,$key);
    $occupation = $_POST['occupation'];
    $occupation = encryptthis($occupation,$key);

    include_once('db_config.php');
    
    
    // $con = mysqli_connect("localhost","root","","digitalprofiledb");

    //     if(!$con)
    //     {
    //         die("Sorry, We are facing a Technical Issue");
    //     }
    //     else{
    //         echo"";
    //     }
    

        $sql = "UPDATE `tbl_nic` SET `nic` = '".$nic."', `firstname` = '".$fname."', `lastname` = '".$lname."', `dob` = '".$dob."', `address` = '".$address."', `occupation` = '".$occupation."' WHERE `tbl_nic`.`nic` ={$nic}";

        if(mysqli_query($con,$sql))
        {
            echo      '<script type="text/javascript">
                            window.location.href = "update_nic_profiles.php";
                        </script>';

        }
        else{
            
            echo "Opps !!! , Something Wrong Please Re-try...";
        }
    
}
?>