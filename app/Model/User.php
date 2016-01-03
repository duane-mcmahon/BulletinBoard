<?php
App::uses('AppModel', 'Model');
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('AuthComponent', 'Controller/Component');


class User extends AppModel
{

    var $name = 'User';
    var $primaryKey = 'user_id';
    var $displayField = 'user_name';
    var $actsAs = array('Containable' => array(true, 'notices' => true));
    var $belongsTo = array('Role');


    var $validate = array(
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric')

            ),
        ),
        'user_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please provide a username/alias.'

            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'This name is already registered',

            )
        ),
        'user_pass' => array(
            'notempty' => array(
                'rule' => array('notempty')

            ),
        ),
        'user_email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Must be a valid email address.'

            ),
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Must be a valid email address.'

            ),
        ),
        'last_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Your family name has not been entered.'

            ),
        ),
        'first_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Your given name has not been entered.'

            ),
        ),
        'address' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'You must provide an address.'

            ),
        ),
        'role_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),

            ),
        ),
    );
    var $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_by',
            'dependent' => false

        )
    );


    public function parentNode()
    {
        if (empty($this->id)) {
            return null;
        }
        $roleId = Hash::get($this->data, 'User.role_id');
        if (empty($roleId)) {
            $roleId = $this->field('role_id');
        }
        if (empty($roleId)) {
            return null;
        } else {
            return array('Role' => array('id' => $roleId));
        }
    }

    public function beforeSave($options = array())
    {

        if (!parent::beforeSave($options)) {

            return false;

        }
        if (!empty($this->data)) {

            $this->data['User']['user_pass'] = AuthComponent::password($this->data['User']['user_pass']);

            $this->data['User']['active'] = 1;

            $this->data['User']['role_id'] = 1;


        }

        return true;

    }



}

