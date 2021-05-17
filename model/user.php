<?php 
    class User {
        public $id;
        public $first_name;
        public $second_name;
        public $login;
        public $password;
        public $blocked;
        public $role_id;

        public function __construct($id, $first_name, $second_name, $login, 
        $password, $blocked, $role_id) {

            $this->id = $id;
            $this->first_name = $first_name;
            $this->second_name = $second_name;
            $this->login = $login;
            $this->password = $password;
            $this->blocked = $blocked;
            $this->role_id = $role_id;
        }

        public function toString() {
            return "id: " . $this->id . "</br>" 
                . "first name: " . $this->first_name . "</br>"
                . "second name: " . $this->second_name . "</br>"
                . "login: " . $this->login . "</br>"
                . "password: " . $this->password . "</br>"
                . "is blocked: " . $this->blocked . "</br>"
                . "role: " . $this->role_id . "</br>";
        }
    }
?>