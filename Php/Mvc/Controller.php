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
               if (!isset($_SESSION["login"])) {
                    $check = $this->model->login();
                    if ($check) {
                         $_SESSION["login"] = "user";
                         $listSv = $this->model->listSv();
                         include 'View/listSv_view.php';
                    }
                    else {
                         include 'View/login_view.php';
                    }
               }
               else {
                    $this->model->listSv();
                    $listSv = $this->model->listSv();
                    include 'View/listSv_view.php';
               }
          }
          public function infoSv()
          {
               $value = $_POST["select"];
               $infoSv = $this->model->infoSv($value);
               include 'View/infoSv_view.php';
          }

     }