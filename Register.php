<!--
//register.php
!-->

<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	header('location:chat.php');
}

if(isset($_POST["register"]))
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$check_query = "
	SELECT * FROM login 
	WHERE username = :username
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':username'		=>	$username
	);
	if($statement->execute($check_data))	
	{
		if($statement->rowCount() > 0)
		{
			$message .= '<p><label>Username already taken</label></p>';
		}
		else
		{
			if(empty($username))
			{
				$message .= '<p><label>Username is required</label></p>';
			}
			if(empty($password))
			{
				$message .= '<p><label>Password is required</label></p>';
			}
			else
			{
				if($password != $_POST['confirm_password'])
				{
					$message .= '<p><label>Password not match</label></p>';
				}
			}
			if($message == '')
			{
				$data = array(
					':username'		=>	$username,
					':password'		=>	password_hash($password, PASSWORD_DEFAULT)
				);

				$query = "
				INSERT INTO login 
				(username, password) 
				VALUES (:username, :password)
				";
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					$message = "<label>Registration Completed</label>";
				}
			}
		}
	}
}

?>

<html>  
    <head>  
       
         <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <link rel="stylesheet" href="bootstrap.css">
        
        <link rel="stylesheet" href="style.css">
    
        <style>
        
            body{
                
                color: black;
            }
            
            
        </style>
    </head>  
    
    <body>  
        
              
        <header>
    
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
             
                <a class="navbar-brand" href="#">Messenger</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                
                    <span class="navbar-toggler-icon"></span>
                    
                </button>

                
                <div class="collapse navbar-collapse" id="navbarColor01">
                
                    <ul class="navbar-nav mr-auto">
                    
                        <li class="nav-item active">
                        
                            <a class="nav-link" href="index.php">Home</a>
                        
                        </li>
                        
                        <li class="nav-item">
                        
                            <a class="nav-link" href="#">Chats<span class="sr-only">(current)</span></a>
                        
                        </li>
                        
                        <li class="nav-item">
                        
                            <a class="nav-link" href="login.php">Log in</a>
                        
                        </li>
                        
                        <li class="nav-item">
                        
                            <a class="nav-link" href="Register.php">Sign in</a>
                        
                        </li>
                        
                    </ul>
                    
                    <form class="form-inline my-2 my-lg-0">
                    
                        <input class="form-control mr-sm-2" type="text" placeholder="Search">
                        
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                        
                    </form>
                    
                </div>
            
            </nav>
      
        </header>
       
        <div class="container">
	
            <br />
			
            <h3 align="center">SIGN IN</h3><br />
       
            <br />
        
        
            <div class="panel panel-default">

                <div class="panel-heading">Messenger Register</div>

                <div class="panel-body">

                    <form method="post">

                        <span class="text-danger"><?php echo $message; ?></span>

                        <div class="form-group">

                            <label>Enter Username</label>

                            <input type="text" name="username" class="form-control" placeholder="Harry Potter" />

                        </div>

                        <div class="form-group">

                            <label>Enter Password</label>

                            <input type="password" name="password" class="form-control"/>

                        </div>

                        <div class="form-group">

                            <label>Re-enter Password</label>

                            <input type="password" name="confirm_password" class="form-control" />

                        </div>

                        <div class="form-group">

                            <input type="submit" name="register" class="btn btn-info" value="Register" />

                        </div>

                        <div align="center">

                            <a href="login.php">Login</a>

                        </div>

                    </form>

                </div>

            </div>
        
        </div>
        
        
        <footer id="sticky-footer" class="py-4 bg-dark text-white-50 navbar navbar-expand-lg navbar-dark bg-primary">
   
            <div class="container text-center">
    
                <small>Copyright &copy; Your Website</small>
    
            </div>
  
        </footer>
        
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   
    </body>  

</html>
