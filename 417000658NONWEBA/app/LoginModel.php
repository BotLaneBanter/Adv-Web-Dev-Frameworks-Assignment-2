<?php 

namespace app\handlers;
use QuwisSystem\Framework\Observable_Model;

class LoginModel extends Observable_Model{

    public function findAll() : array {

        //Get all contents of the users table
        $usersSQL = "SELECT * FROM users";
        $checkUsers = mysqli_query($this->db, $usersSQL);

        //Fetch records 
        $userData = [];
        while($result = $checkUsers->fetch_assoc()){
            $userData['users'][] = [ 'name' => $result['name'], 
                                     'email' => $result['email'], 
                                     'password' => $result['password'] ];
        }

        //Return an associative multidimensional array of users
        return $userData;

    }

    public function findRecord(string $id) : array {

        //Get all contents of the users table
        $usersSQL = "SELECT * FROM users";
        $checkUsers = mysqli_query($this->db, $usersSQL);


        //Fetch records 
        $userData = [];
        while($result = $checkUsers->fetch_assoc()){
            $userData['users'][] = [ 'name' => $result['name'], 
                                     'email' => $result['email'], 
                                     'password' => $result['password'] ];
        }

        if(!empty($userData)){

            //Find the key corresponding to the id (email = id in this case) of the user
            $key = array_search($id, array_column($userData['users'], 'email'));

            //Check if the email at that position is equal
            if($userData['users'][$key]['email'] == $id){
                return ['users' => [ 'Name' => $userData['users'][$key]['name'], 'Email' => $userData['users'][$key]['email'], 'Password' => $userData['users'][$key]['password']] ];
            }

        }

        return ['users' => [ 'Name' => '', 'Email' => '', 'Password' => '']];

    }



}

?>