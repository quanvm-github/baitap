<?php
    App::uses('AppModel', 'Model');
    App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

    class User extends AppModel
    {
        public $validate = array(// dung de validate thong tin user
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required'
            ),
            'alphanumeric' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Usernames must only contain letters and numbers'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            )
        )
        );

        // co the dung md5 de thay the
        public function beforeSave($options = array()) {
            if (isset($this->data[$this->alias]['password'])) {
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
                );
            }
            return true;
        }
    }