<?php

require_once('db_connect.php');

function getUserBase () {

  global $db;
  $return = [];
  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);
  $username = $request->username;
  $password = $request->password;

  $password = md5($password);
  $password = sha1($password);

  $id = uniqid('mbq',false).time();
  $name = $request->name;
  $email = $request->email;
  $phone = $request->phone;
  $address = $request->address;
  $city = $request->city;
  $state = $request->state;
  $zip = $request->zip;
  $status = $request->status;

  if($status === false){
    $check = $db -> query("SELECT `username` FROM `users` WHERE `username` ='$username'");
    if($check -> num_rows == 0){
      $query = "INSERT INTO `users` SET (`user_id`,`username`,`password`,`name`,`email`,`phone_number`,`street_address`,`city`,`state`,`zip`) VALUES ('$id','$username','$password','$name','$email','$phone','$street','$city','$state','$zip')";
      if(mysqli_query($conn,$query)) {

      } else {
        $error = "Please enter all fields.";
      }
    }
    else {
      $result['success'] = false;
      $return['error']['username'] = false;
      $return['error']['message'] = "Error this usersname is already in use. Please choose another username.";
      exit();
    }
  }

  $user = $db -> query("SELECT `username` , `password`, `user_id` FROM `users` WHERE `username` = '".$username."'");

  if($user -> num_rows == 1) {
    $password = $db -> query("SELECT `username` , `password`, `user_id` FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'");
    if($password->num_rows==1){
      $token = uniqid('mbq',true);
      $token = sha1($token);
      $time = time();
      $token = $token.uniqid('token',true).$time;
      $token = sha1($token);

      $return['success']['success'] = true;
      $return['success']['token'] = $token;

      $user_token = $db -> query("SELECT * FROM `token` WHERE `username`='$username'");

      if($user_token->num_rows==1){
        $db -> query("UPDATE `token` SET `token` = '$token' , `unix_timestamp` = '$time' WHERE `username` = '$username'");
      }
      else{
        $db->query("INSERT INTO `token`(`username`, `token`,`unix_timestamp`) VALUES ('$username' , '$token','$time')");
      }

      $return = json_encode($return);

      print($return);
    }
    else {
      $return['success'] = false;
      $return['error']['message'] = "Error you have entered the wrong password.";
    }
  }
  else {
    $return['success'] = false;
    $return['error']['message'] = "Error you have entered the wrong username.";
  }
}

getUserBase();

?>
