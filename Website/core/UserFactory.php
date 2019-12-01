<?php

class UserFactory {

    public static function createUser($userType,$username) {
        if($userType == "Customer") {
            $user = new Customer($username);
            return $user;
        } elseif($userType == "Promoter") {
            $user = new Promoter($username);
            return $user;            
        } else {
            $user = new Administrator($username);
            return $user;
        }
    }
}