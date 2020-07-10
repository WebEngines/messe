<html>  
    
    <head>  
    
        <title>Chat Application using PHP Ajax Jquery</title>  
		
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <link rel="stylesheet" href="css/bootstrap.css">
        
        <link rel="stylesheet" href="css/style.css">

    
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
                        
                            <a class="nav-link" href="profile.php">Profile</a>
                        
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
        
        <?php

            //logout.php

            session_start();

            session_destroy();

            header('location:login.php');

        
        ?>


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