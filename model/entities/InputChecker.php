<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 6/3/2015
 * Time: 12:01 AM
 */

class InputChecker {
    /**
     * @param $val
     * @param string $exception_msg
     * @return bool
     * @throws exception
     */
    static function isNonNegativeInteger($val, $exception_msg = ""){
        if(isset($val)?(is_int($val)?($val >= 0):false):false) {
            return true;
        } else {
            if($exception_msg === ""){
                return false;
            } else {
                throw new exception($exception_msg);
            }
        }
    }

    /**
     * @param $val
     * @param string $exception_msg
     * @return bool
     * @throws exception
     */
    static function isNumeric($val, $exception_msg = ""){
        if(isset($val)?(is_numeric($val)):false) {
            return true;
        } else {
            if($exception_msg === ""){
                return false;
            } else {
                throw new exception($exception_msg);
            }
        }
    }

    /**
     * @param $val
     * @param string $exception_msg
     * @return bool
     * @throws exception
     */
    static function isAlphaNumeric($val, $exception_msg = ""){
        if(isset($val)?(ctype_alnum($val) && $val !== ""):false) {
            return true;
        } else {
            if($exception_msg === ""){
                return false;
            } else {
                throw new exception($exception_msg);
            }
        }
    }

    /**
     * @param $val
     * @param string $exception_msg
     * @return bool
     * @throws exception
     */
    static function isValidEmailAddress($val, $exception_msg = ""){
        if(isset($val)?(filter_var($val, FILTER_VALIDATE_EMAIL)):false) {
            return true;
        } else {
            if($exception_msg === ""){
                return false;
            } else {
                throw new exception($exception_msg);
            }
        }
    }

    /**
     * @param $val
     * @param string $exception_msg
     * @return bool
     * @throws exception
     */
    static function isWhollyAlphabetic($val, $exception_msg = ""){
        if(isset($val)?(ctype_alpha($val) && $val !== ""):false){
            return true;
        } else {
            if($exception_msg === ""){
                return false;
            } else {
                throw new exception($exception_msg);
            }
        }
    }
}