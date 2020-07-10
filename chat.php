<!--
//index.php
!-->

<?php

include('database_connection.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}

?>

<html>  
  
    <head>
	
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
		
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <title>Chat Application using PHP Ajax Jquery</title>  
		
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
        
        <link rel="stylesheet" href="bootstrap.css">
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		
        <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
        
        
        <style>
            
            body{
                color: white;
            }
            
            .col-lg-12{
                
                background-color: #333333;
            }
            
            .header{
                
                border-bottom: 2px solid white;
                margin: 10px;
                
            }
            
            #profilepic{
                
                margin-left: 30px;
                margin-top: 20px;
                width: 75px;
                height: 75px;
                border-radius: 50%;
            }
            
            .profilepicture{
                
                margin: 10px;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                
                
            }
            
            .messageAndTime{
              
                margin: 10px 0px;
            }
            
        
            #DateTime{
                
                font-size: 10px;
                text-align: end;
            }
            
            #personName{
                
                font-size: 20px;
                text-align: left;
            }
            
            #message{
                
                font-size: 15px;
                
            }
            
            #person{
                
                border-bottom: 2px solid black;
                border-right: none;
            }
            
            .col-lg-8{
             
                background-color: #333333;
                padding: 20px;
                
            }
            
            .page{
                
                margin: 10px;
            }
            
            .name{
                
                margin: 10px;
                 
            }
            
            #chat_dashboard{
                
                background-color: #CFCFCF;
                width: 100%;
                margin: 0 auto;
                height: auto;

            }
            
            #chatmessage{
                width: 80%;
                height: 40px;
                border: 2px solid black;
                margin: 0 30px;
            }
            
            #send{
                
                padding: 4px 14px;
                border: 2px solid black; 
                background-color: white;
                
            }
        
            #png{
                
                width: 20px;
                border-right: none;
                
            }
            
            #sendmessage{
                
                width:100%;
                padding: 10px;
                height: auto;
                
            }
            
            #chat_messages{
                
                width: 100%;
                color: black;
                margin:4px, 4px; 
                padding:4px;  
                height: 400px;  
                overflow-x: auto; 
                overflow-y: auto; 
                 
            }
            
            
          
            #messagebox{
                
                background-color: white;
                width: 100%;
                height: 550px;
            }
            

            html,
            body {
              height: 100%;
            }

            #page-content {
              flex: 1 0 auto;
            }

            #sticky-footer {
           
                flex-shrink: none;
                margin-top: 10px;
                
            }

            /* Other Classes for Page Styling */

          
            
            nav{
                
                margin-bottom: 10px;
            }
            
            
            .message_send{
                
                border: 2px solid black;
                width: auto;
                padding: 5px;
                margin: 0 10px;
                border-top-left-radius: 10px;
                border-bottom-left-radius:10px; 
                border-bottom-right-radius: 10px;
                border-top-right-radius: none;
               
            }
            
            
            .row{
                
                margin:10px;
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
                        
                            <a class="nav-link" href="profile.php">Profile</a>
                        
                        </li>
                        
                        <li class="nav-item">
                        
                            <a class="nav-link" href="#">Chats<span class="sr-only">(current)</span></a>
                        
                        </li>
                        
                        <li class="nav-item">
                        
                            <a class="nav-link" href="profile.php">Log in</a>
                        
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
		
            <div class="row" style="color:black;">
			
                <div class="col-md-6 col-sm-6">
				
                    <h4>Online User</h4>
			
                </div>
				
                <div class="col-md-3 col-sm-3">
				
                    <input type="hidden" id="is_active_group_chat_window" value="no" />
					
                    <button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">Group Chat</button>

                </div>
				
                <div class="col-md-3 col-sm-3">
				
                    <p align="right">Hi - <?php echo $_SESSION['username']; ?> - <a href="logout.php">Logout</a></p>
				
                </div>
			
            </div>
		
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-lg-12">
                
                        <div class="contacts">
                     
                            <div class="container">
        
                                <h3 class="header">Contacts</h3>
                            
                            </div>
                        
                            <div class="row" id="person">
                                 
                            </div>
                        
                        </div>
                    
                        <div class="container page">
                         
                            <ul class="pagination">
                             
                                <li class="page-item disabled">
                                
                                    <a class="page-link" href="#">&laquo;</a>
                            
                                </li>
                                
                                <li class="page-item active">
                                
                                    <a class="page-link" href="#">1</a>
                            
                                </li>
                                
                                <li class="page-item">
                                
                                    <a class="page-link" href="#">2</a>
                                
                                </li>
                                
                                <li class="page-item">
                                
                                    <a class="page-link" href="#">3</a>
                                
                                </li>
                                
                                <li class="page-item">
                                
                                    <a class="page-link" href="#">4</a>
                                
                                </li>
                                
                                <li class="page-item">
                                
                                    <a class="page-link" href="#">5</a>
                            
                                </li>
                                
                                <li class="page-item">
                                
                                    <a class="page-link" href="#">6</a>
                            
                                </li>
                                
                                <li class="page-item">
                                
                                    <a class="page-link" href="#">&raquo;</a>
                            
                                </li>
                             
                            </ul>
                    
                        </div>
                
                    </div>
                    
                    <div id="user_model_details"></div>
                    
                </div> 
              
                
            </div>
            
        </div>
        
        
        <footer id="sticky-footer" class="py-4 bg-dark text-white-50 navbar navbar-expand-lg navbar-dark bg-primary">
   
            <div class="container text-center">
    
                <small>Copyright &copy; Your Website</small>
    
            </div>
  
        </footer>
		
    </body>  

</html>


<div id="group_chat_dialog" title="Group Chat Window">

    <div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

	</div>
	
    <div class="form-group">
	
        <!--<textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>!-->
		
        <div class="chat_message_area">
		
            <div id="group_chat_message" contenteditable class="form-control">

			
            </div>
			
            <div class="image_upload">
			
                <form id="uploadImage" method="post" action="upload.php">
				
                    <label for="uploadFile"><img src="upload.png" /></label>
					
                    <input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />

                </form>

            </div>

        </div>
	
    </div>
	
    <div class="form-group" align="right">
	
        <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
	
    </div>

</div>


<script>  
   
$(document).ready(function(){

	fetch_user();

	setInterval(function(){
		update_last_activity();
		fetch_user();
		update_chat_history_data();
		fetch_group_chat_history();
	}, 5000);

	function fetch_user()
	{
		$.ajax({
			url:"fetch_user.php",
			method:"POST",
			success:function(data){
				$('#person').html(data);
			}
		})
	}

	function update_last_activity()
	{
		$.ajax({
			url:"update_last_activity.php",
			success:function()
			{

			}
		})
	}

	function make_chat_dialog_box(to_user_id, to_user_name)
	{
		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
		modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
		$('#user_model_details').html(modal_content);
	}

	$(document).on('click', '.start_chat', function(){
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
		make_chat_dialog_box(to_user_id, to_user_name);
		$("#user_dialog_"+to_user_id).dialog({
			autoOpen:false,
			width:400
		});
		$('#user_dialog_'+to_user_id).dialog('open');
		$('#chat_message_'+to_user_id).emojioneArea({
			pickerPosition:"top",
			toneStyle: "bullet"
		});
	});

	$(document).on('click', '.send_chat', function(){
		var to_user_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+to_user_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					//$('#chat_message_'+to_user_id).val('');
					var element = $('#chat_message_'+to_user_id).emojioneArea();
					element[0].emojioneArea.setText('');
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_user_chat_history(to_user_id)
	{
		$.ajax({
			url:"fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#chat_history_'+to_user_id).html(data);
			}
		})
	}

	function update_chat_history_data()
	{
		$('.chat_history').each(function(){
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history(to_user_id);
		});
	}

	$(document).on('click', '.ui-button-icon', function(){
		$('.user_dialog').dialog('destroy').remove();
		$('#is_active_group_chat_window').val('no');
	});

	$(document).on('focus', '.chat_message', function(){
		var is_type = 'yes';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{

			}
		})
	});

	$(document).on('blur', '.chat_message', function(){
		var is_type = 'no';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{
				
			}
		})
	});

	$('#group_chat_dialog').dialog({
		autoOpen:false,
		width:400
	});

	$('#group_chat').click(function(){
		$('#group_chat_dialog').dialog('open');
		$('#is_active_group_chat_window').val('yes');
		fetch_group_chat_history();
	});

	$('#send_group_chat').click(function(){
		var chat_message = $.trim($('#group_chat_message').html());
		var action = 'insert_data';
		if(chat_message != '')
		{
			$.ajax({
				url:"group_chat.php",
				method:"POST",
				data:{chat_message:chat_message, action:action},
				success:function(data){
					$('#group_chat_message').html('');
					$('#group_chat_history').html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_group_chat_history()
	{
		var group_chat_dialog_active = $('#is_active_group_chat_window').val();
		var action = "fetch_data";
		if(group_chat_dialog_active == 'yes')
		{
			$.ajax({
				url:"group_chat.php",
				method:"POST",
				data:{action:action},
				success:function(data)
				{
					$('#group_chat_history').html(data);
				}
			})
		}
	}

	$('#uploadFile').on('change', function(){
		$('#uploadImage').ajaxSubmit({
			target: "#group_chat_message",
			resetForm: true
		});
	});

	$(document).on('click', '.remove_chat', function(){
		var chat_message_id = $(this).attr('id');
		if(confirm("Are you sure you want to remove this chat?"))
		{
			$.ajax({
				url:"remove_chat.php",
				method:"POST",
				data:{chat_message_id:chat_message_id},
				success:function(data)
				{
					update_chat_history_data();
				}
			})
		}
	});
	
});  
</script>