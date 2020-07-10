<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM login 
WHERE user_id != '".$_SESSION['user_id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
                       
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<p class="alert alert-success">Online</p>';
	}
	else
	{
		$status = '<p class="alert alert-danger">Offline</p>';
	}
	$output .= '
	
            <div class="col-sm-3" id="profileinfo">
            <img src="IMG20190609173043.jpg" id="profilepic">
            </div>
            <div class="messageAndTime col-sm-9">

           <h1 id="personName">'.$row['username'].'<span style="border-radius:50%; margin-left:50px;">'.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).' </span>
           <span style="float:right;">Last Seen: '.$user_last_activity.'</span>
           </h1>   
           
           
             <button class="btn btn-info btn-xs  start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'" >Start Chat</button>
           
           <p id="message">'.$status.'</p>
          
           
           
           </div>
           
	';
}

$output .= '</div>';

echo $output;

?>