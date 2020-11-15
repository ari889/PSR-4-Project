<?php
  namespace App\Show;

  use App\Support\Database;

  class Show extends Database{
      public function allTeachers(){
        return $this -> find('users', ['*'], ['register_as' => 'teacher']);
      }
      public function allStudents(){
        return $this -> find('users', ['*'], ['register_as' => 'student']);
      }
      public function allStaff(){
        return $this -> find('users', ['*'], ['register_as' => 'staff']);
      }

      public function singleUser($user_id){
        return $this -> find('users', ['*'], ['user_id' => $user_id]);
      }

      public function deleteUser($delete_id){
          return $this -> delete('users', ['user_id' => $delete_id]);
      }
  }
 ?>
