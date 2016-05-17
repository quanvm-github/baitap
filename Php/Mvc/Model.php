<?php 
    class Model
    {
        public function login()
        {
            $username = $_POST["username"];
            $password = $_POST["password"];
            if ($username == "user" && $password == "1") {
                return true;
            }
            else return false;
        }

        public function listSv()
        {
            $listSv = array("sinh vien A", "sinh vien B", "sinh vien C", "sinh vien D", "sinh vien E");
            return $listSv;
        }

        public function infoSv($value)
        {
            $name = array("sinh vien A", "sinh vien B", "sinh vien C", "sinh vien D", "sinh vien E");
            $age = array("19", "20", "21", "22", "23");
            $infoSv = array($name[$value], $age[$value]);
            return $infoSv;
        }
 
    }