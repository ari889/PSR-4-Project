<?php

  namespace App\Register;

  use App\Support\Database;

  class Register extends Database{
    public function registerUser($name, $uname, $email, $cell, $register_as){
      $data = $this -> create('users', ['name' => $name, 'email' => $email, 'cell' => $cell, 'uname' => $uname, 'register_as' => $register_as]);

      if($data){
        return '<div class="alert alert-success"><strong>Success!</strong> Registration Successful. <button class="close" type="button" data-dismiss="alert">&times;</button></div>';
      }else{
        return '<div class="alert alert-danger"><strong>Stop!</strong> Something wrong. <button class="close" type="button" data-dismiss="alert">&times;</button></div>';
      }
    }

    public function updateUser($name, $uname, $email, $cell, $user_id){
      return $this -> update('users', ['name' => $name, 'uname' => $uname, 'email' => $email, 'cell' => $cell], ['user_id' => $user_id]);
    }
  }

 ?>
