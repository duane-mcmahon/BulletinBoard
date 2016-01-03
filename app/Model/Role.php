<?php
App::uses('AppModel', 'Model');

class Role extends AppModel {

    public $hasMany = array('User');

    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        if (empty($this->id)) {
            return null;
        }
        $roleId = Hash::get($this->data, 'Role.role_id');
        if (empty($roleId)) {
            $roleId = $this->field('role_id');
        }
        if (empty($roleId)) {
            return null;
        } else {
            return array('Role' => array('id' => $roleId));
        }
    }
}