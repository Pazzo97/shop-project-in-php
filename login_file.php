<?php include('include/home/header.php'); ?>
<?php include('dbnew.php'); ?>
<?PHP
  if(isset($_POST['submit']))
  {
		$uname = $_POST['username'];
		$pass = $_POST['password'];
			$query ="SELECT*FROM user WHERE username = '$uname' and password = '$pass'";

			$qry=mysqli_query($conn,$query);
				if (mysqli_num_rows($qry) > 0){
					
						$_SESSION['username']= $_POST['username'];
						header("location: admin.php");
					}
 
					else {
						header("location: login.php");
					}
		/*
			$uname = $_POST['username'];
			$pass = $_POST['pass'];
		$sel = "SELECT*FROM users WHERE username = '$uname' && pass = '$pass'";
		$result = $conn->query($sel);

		if ($result->num_rows > 0) {
				$_SESSION['username'] = $fname ;
				header('location: admin.php');
			}
			else {
				die("never login".mysql_error());
			}
		*/
  }

?>	