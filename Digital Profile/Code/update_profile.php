<?php
                include_once('db_config.php');

                $key = 'qkwjdiw239&&jdafweihbrhnan&^%';

                function encryptthis($data,$key){
                    $encryption_key = base64_decode($key);
                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
                    $encrypted = openssl_encrypt($data,'AES-256-CBC',$encryption_key,0,$iv);
                    return base64_encode($encrypted . '::' . $iv);
                }




				if(isset($_POST["btnSubmit"]))
				{
					
					$password = $_POST["password"];
                    $encrypt_password = encryptthis($password,$key);
					$contact = $_POST["contact"];
					$employment = $_POST["employment"];
					
					
					
					

						$sql = "UPDATE `tbl_nic` SET `encrypt_password` = '".$encrypt_password."', `contact_no` = '".$contact."', `job_ststus` = '".$employment."' WHERE `tbl_nic`.`nic` ='".$_SESSION['nic']."'";

						if(mysqli_query($con,$sql))
						{
							
							header('Location:home.php');
						}
						else{
							
							echo "Opps !!! , Something Wrong Please Re-try...";
						}
					
				}
					
			
			?>