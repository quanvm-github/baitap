<?php
    App::uses('AppController', 'Controller');

    class UsersController extends AppController {

    // chi cho phep user duoc login
    public function beforeFilter() {
        $this->Auth->allow('login');
    }

    // hien danh sach all user
    public function index() {
        $this->set('user', $this->User->find('all'));
    }

    public function login() {
        if ($this->request->is('post')) {// chi chap nhan request la post
            $this->User->set($this->request->data);
            if ($this->User->validates()) {// validate data truoc khi login
                if ($this->Auth->login()) {
                    return $this->redirect('index');// den trang index khi login thanh cong
                } else {
                    $this->Flash->error(__('Invalid username or password, try again'));
                }
            } else {
                $errors = $this->User->validationErrors;
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    // chi xem 1 user
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {// kiem tra user co ton tai hay khong
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->Auth->user('role') == 'admin') {// chi cho admin duoc add new user
            if ($this->request->is('post')) {
                if (!$this->User->hasAny(['username' => $this->request->data['User']['username']])) {// chi add user nao chua ton tai
                    $this->User->create();
                    if ($this->User->save($this->request->data)) {
                        $this->Flash->success(__('The user has been saved'));
                        return $this->redirect('index');
                    } else {
                        $this->Flash->error(__('The user could not be saved. Please, try again.'));
                    }
                }
                else {
                    $this->Flash->error(__('The username is unvaliable. Please, try again.'));
                }
            }
        }
        else {
            $this->Flash->error(__('Admin only !'));
            return $this->redirect('index');
        }
    }

    // chinh sua user
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {// request put la request dung de update, formhelper tu dong sinh ra
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect('index');
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    // xoa user nhung chi chap nhan request la post
    public function delete($id = null) {
        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect('index');
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}   