<?php include('dbnew.php'); ?>
<?php
    $jim = new Admin();
    $p = isset($_GET['p']) ? $_GET['p'] : null;
    if($p == 'deliver'){
        $jim->deliver(); 
    }else if($p == 'paid'){
        $jim->paid();   
    }else if($p == 'delete'){
        $jim->delete();   
    }
    
    class Admin {
        
        function getunpaidorders(){
            include('dbnew.php');
                $q = "SELECT * FROM dbgadget.order where status='unconfirmed' order by dateOrdered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        function getdeliveredorders(){
            include('dbnew.php');
                $q = "SELECT * FROM dbgadget.order where status='delivered' order by dateDelivered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        function getpaidorders(){
            
            include('dbnew.php');
                $q = "SELECT * FROM dbgadget.order where status='confirmed' order by dateDelivered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        
        function getorder(){
            include('dbnew.php');
            $id = $_GET['id'];
            $q = "SELECT * FROM dbgadget.order where id=$id";
            $result = mysqli_query($conn,$q);
            
            return $result;
        }
        
        function deliver(){
            include('dbnew.php');
            $date = date('m/d/y h:i:s A');
            $id = $_GET['id'];
            $q = "UPDATE dbgadget.order set dateDelivered='$date', status='delivered' where id=$id";
            mysqli_query($conn,$q);
            
            return true;
        }
        function paid(){
            include('dbnew.php');
            $id = $_GET['id'];
            $date = date('m/d/y h:i:s A');
            $q = "UPDATE dbgadget.order set dateDelivered='$date', status='confirmed' where id=$id";
            mysqli_query($conn,$q);
            
            return true;
        }
        
        function getcategory(){
            include('dbnew.php');
            $q = "SELECT * from dbgadget.category order by title asc";
            $result = mysqli_query($conn,$q);
            
            return $result;
        }
        function addcategory($cat){
            include('dbnew.php');
            $q = "INSERT INTO dbgadget.category values('','$cat')";
            mysqli_query($conn,$q);
            return true;
        }
        
        function delete(){
            include('dbnew.php');
            $table = $_GET['table'];
            $id = $_GET['id'];
            //echo $q = "DELETE FROM dbgadget.$table where id=$id";
            mysqli_query($conn,"DELETE FROM dbgadget.$table where id=$id");
            return true;
        }
        
        function getcategorybyid($id){
            include('dbnew.php');
            $q = "Select * from dbgadget.category where id=$id";
            $result = mysqli_query($conn,$q);
            if($row = mysqli_fetch_array($result)){
                $category = $row['title'];
            }
            return $category;
        }
        
        function updatecategory($cat,$id){
            include('dbnew.php');
            $q = "update dbgadget.category set title='$cat' where id=$id";   
            mysqli_query($conn,$q);
            return true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php //include('session.php'); ?>
<link rel="stylesheet" href="css/style1.css" type="text/css" media="screen" charset="utf-8">
<script src="admin.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>






    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop |BAMU ELECTRONICS</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<!-- <link href="css/responsive.css" rel="stylesheet"> -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>+250-789-287-020</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> bamuelectronics@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    