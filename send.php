<?php 
    
    $token = $_POST['token'];
    $message = $_POST['message'];
//    echo $token;
	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'data' => $message
			);
		$headers = array(
			'Authorization:key = AAAAIkgEaXU:APA91bHLfMZOeejzbkynmiaFwkaWTYM28BcXOu5pVyjl_3GF92GyIfe41Ol5yOnvVkdDpEHmoHXtOQ-S-Nz90bwMhFtJahY7YrH4yrpwima17sPD_bz0kh1drabXqS583MIoczorRKQP',
			'Content-Type: application/json'
			);
	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       echo $result;
	}

    $tokens = array();    
    $tokens[] = $token;
    // print_r ($tokens);
    $message = array("message" => $message);
    send_notification($tokens, $message);
