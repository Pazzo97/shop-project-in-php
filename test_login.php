<?php
						if (isset($_POST['submit'])){
							$fname = $_POST['username'];
							$pass = $_POST['password'];
						
							$sel = "SELECT*FROM users WHERE username = '$fname' && password = '$pass'" ;
						
							$result = mysqli_query($con, $sel);
						
							$num = mysqli_num_rows($result);
						
							if($num == 1){
								header('location:admin.php');
							}
							else {								
								header('location: login.php');
							}
						}
						
						?>