<?php
    class ShopController extends AppController
    {
        var $layout = 'Cake';
        public function beforeFilter() {
            $this->Auth->allow();
        }
        public function index() {
            $this->set('element', 'shop_index');
        }

        public function map()
        {
            $this->set('element', 'shop_map');
            $this->render('index');
        }
    }