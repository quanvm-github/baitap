<?php
    class ShopController extends AppController
    {
        var $layout = 'Cake';// dung chung 1 layout cho tat ca cac action
        public function beforeFilter() {
            $this->Auth->allow();
        }

        // tuy vao request la gi thi set element tuong ung
        public function index() {
            $this->set('element', 'shop_index');// auto call render index tuong ung ten action
        }

        // tuy vao request la gi thi set element tuong ung
        public function map()
        {
            $this->set('element', 'shop_map');
            $this->render('index');// render vao lai trang index, chi thay doi elment la shop_map
        }
    }