<?php
    defined("COME") or exit("非法进入");
    class session{
        function set($attr,$val){
            $_SESSION[$attr] = $val;
        }
        function get($attr){
            return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
        }
        function del($attr){
            unset($_SESSION[$attr]);
        }
        function clear(){
            foreach ($_SESSION as $key=>$value){
                unset($_SESSION[$key]);
            }
        }
    }
