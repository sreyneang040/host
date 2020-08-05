<?php
namespace App\Validation;
use App\Models\UsersModel;
class UserRole{

   // the validateUser function it will 
   // - return true if email and password match with account in database
   // - return false if email and password not match with account in database
   public function validateUser( string $str, string $fields,array $data)
   {
       $model = new UsersModel();
       $user = $model->where('email',$data['email'])
                     ->first();
       if(!$user)
           return false;

       return password_verify($data['password'],$user['password']);
   }
}