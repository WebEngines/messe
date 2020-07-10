<!--
//login.php
!-->

<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	header('location:chat.php');
}

if(isset($_POST['login']))
{
	$query = "
		SELECT * FROM login 
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $_POST["username"]
		)
	);	
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if(password_verify($_POST["password"], $row["password"]))
			{
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$sub_query = "
				INSERT INTO login_details 
	     		(user_id) 
	     		VALUES ('".$row['user_id']."')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				header('location:chat.php');
			}
			else
			{
				$message = '<label>Wrong Password</label>';
			}
		}
	}
	else
	{
		$message = '<label>Wrong Username</labe>';
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
                        
                            <a class="nav-link" href="chat.php">Chats<span class="sr-only">(current)</span></a>
                        
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
			
			<h3 align="center">LOGIN</h3><br />
		
            <br />
			
            <div class="panel panel-default">
  			
                <div class="panel-heading">Messenger Login</div>
				
                <div class="panel-body">
				
                    <p class="text-danger"><?php echo $message; ?></p>
					
                    <form method="post">
					
                        <div class="form-group">
						
                            <label>Enter Username</label>
							
                            <input type="text" name="username" class="form-control" required placeholder="Harry Potter" />
						
                        </div>
						
                        <div class="form-group">
						
                            <label>Enter Password</label>
							
                            <input type="password" name="password" class="form-control" required />
				
                        </div>
						
                        <div class="form-group">
						
                            <input type="submit" name="login" class="btn btn-info" value="Login" />
				
                        </div>
						
                        <div align="center">
						
                            <a href="register.php">Register</a>
				
                        </div>
					
                    </form>
					
                    <br />
					
                    <br />
					
                    <br />
					
                    <br />

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