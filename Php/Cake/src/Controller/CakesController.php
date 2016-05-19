<?php
    namespace App\Controller;

    class CakesController extends AppController
    {
        public function index()
        {
            $this->viewBuilder()->layout('Cakes');
            $this->render();
        }
    }