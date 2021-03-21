<?php include('include/home/header.php'); ?>
<?php include('dbnew.php'); ?>


	<section id='form'><!--form-->
		<div class='container'>
			<div class='row'>
				<div class='col-sm-4 col-sm-offset-1'>
					<div class='login-form'><!--login form-->
<div class='error'></div>


						<h2>Administrative Login</h2>
						  <form method='POST' action="login_file.php">
							<input type='text' name = 'username' placeholder='username' required/>
                            <input type='password' name = 'password' placeholder='password' required/>
							<button  type='submit' name = 'submit' class='btn btn-default login'>Login</button>

<!-- 							
							<form method="POST"></form>
						  <input type='text' name = 'username' placeholder='username' id='username' required/>
                            <input type='password' name = 'password' placeholder='password' id='password' required/>
                            <button  type='button' name = 'submit' class='btn btn-default' id='login'>Login</button> -->

							
							
                        </form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
   
    
<?php include('include/home/footer.php'); ?>
