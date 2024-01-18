<?php

class TokenGenerator {

    private static $encnum = 7841569;

    public static function generateToken($id) {
        return $id * self::$encnum;
    }

    public static function tokenToId($token) {
        return $token / self::$encnum;
    }

}



?>