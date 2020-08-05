<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['first_name', 'last_name','email','password','profile','role','date_of_birth','gender','city'];

    public function createUsers($userInformation)
    {
        $passwordEncrypted = password_hash($userInformation['password'],PASSWORD_DEFAULT);
        $firstName = $userInformation['first_name'];
        $lastName = $userInformation['last_name'];
        $email = $userInformation['email'];
        $role = $userInformation['role'];
        $this->insert([
            'first_name' 	=> $firstName,
            'last_name' 	=> $lastName,
            'email' 	=> $email,
            'password' 	=> $passwordEncrypted,
            'role' 		=> $role
        ]);
    }
  
}