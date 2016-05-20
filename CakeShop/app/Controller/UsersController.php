<?php
    App::uses('AppController', 'Controller');

    class UsersController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow('login');
    }

    public function index() {
        $this->set('user', $this->User->find('all'));
    }

    public function login() {
        if ($this->request->is('post')) {
            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                if ($this->Auth->login()) {
                    return $this->redirect('index');
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

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->Auth->user('role') == 'admin') {
            if ($this->request->is('post')) {
                if (!$this->User->hasAny(['username' => $this->request->data['User']['username']])) {
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

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect('index');
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

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