<?php

class PasswordHasher {
    static function hash($password){
        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT, $options);
        /* REMEMBER : password_hash contains the salt and algorithm that were used so that we can verify the hash later. */

        return $hashed_password;
    }

    static function verify($password,$hash){
        return password_verify($password,$hash);
    }
}