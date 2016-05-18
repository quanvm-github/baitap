<?php
     include_once("Model.php");

     class Controller
     {
          private $model;

          public function __construct()
          {
               $this->model = new Model();
          }

          public function index()
          {
               // not login yet
               if (!isset($_SESSION["login"])) {
                    // check login
                    $check = $this->model->login();
                    // login success
                    if ($check) {
                         $_SESSION["login"] = "user";
                         $listSv = $this->model->listSv();
                         include 'View/listSv_view.php';
                    }
                    else {
                         // login false
                         include 'View/login_view.php';
                    }
               }
               // already login success
               else {
                    $this->model->listSv();
                    $listSv = $this->model->listSv();
                    include 'View/listSv_view.php';
               }
          }

          // show info sinh vien by selected value
          public function infoSv()
          {
               $value = $_POST["select"];
               $infoSv = $this->model->infoSv($value);
               include 'View/infoSv_view.php';
          }

     }