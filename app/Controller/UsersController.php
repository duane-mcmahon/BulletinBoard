<?php
class UsersController extends AppController {

    var $name = 'Users';

    function index() {

        $this->layout = 'users_index';

        $this->User->recursive = 0;

        $this->set('users', $this->Paginator->paginate());

    }

    function view($id = null) {
        $this->layout = 'users_view';
        if (!$id) {

            $this->Session->setFlash(__('Invalid user', true));

            $this->redirect(array('action' => 'index'));

        }

        $this->set('user', $this->User->read(null, $id));

    }

    function add() {
        if (!empty($this->data)) {

            $this->User->create();

            if ($this->User->save($this->data)) {

                $data = $this->User->read();

                $this->Session->setFlash(__('The user has been saved. Please log in to continue.', true));
                
                $this->redirect(array('action' => 'login'));


            } else {

                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null)
    {
        $this->layout = 'users_edit';

        if (!$id && empty($this->data)) {

            $this->Session->setFlash(__('Invalid user', true));

            $this->redirect(array('action' => 'index'));

        }
        if (!empty($this->data)) {

            if ($this->User->save($this->data)) {

                $this->Session->setFlash(__('The user has been saved', true));

                $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));

            }
        }
        if (empty($this->data)) {

            $this->data = $this->User->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for user', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('User deleted', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('User was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {


        parent::beforeFilter();

        $this->Auth->allow('add', 'login', 'logout');

        $this->Auth->autoRedirect = false;

        //$this->Auth->allow(array('*'));


    }

    public function login()
    {


        if ($this->request->is('post')) {


            if ($this->Auth->login()) {

                return $this->redirect(array('controller' => 'pages', 'action' => 'display'));

            } else {

                $this->Session->setFlash(__('Invalid username or password, try again'));
            }

        }

    }


    public function logout() {

        return $this->redirect($this->Auth->logout());

    }



    public function isAuthorized($user = null)
    {

        //return parent::isAuthorized($user);

        $userId = $this->Auth->user('user_id');

        $role = $this->Auth->user('role_id');

        switch ($this->action) {

            case 'add':

                $this->Auth->allow();

                break;

            case 'delete':

                if ($role != 2) {

                    $this->Session->setFlash(__('Insufficient Privileges', true));

                    $this->redirect(array('action' => 'index'));

                    return false;

                } else {

                    $this->Auth->allow();
                }
                break;

            case 'edit':

                //requires check if editor is owner or admin

                if (($role == 2) || ($this->isMine())) {

                    $this->Auth->allow();

                } else {

                    $this->Session->setFlash(__('Insufficient Privileges', true));

                    $this->redirect(array('action' => 'index'));

                    return false;


                }
                break;

            case 'view':


                $this->Auth->allow();

                break;

            case 'index':


                $this->Auth->allow();


                break;


        }


        return true;



    }


//the following functionality is adapted from code found here:
// http://solvedstack.com/questions/cakephp-acl-database-setup-aro-aco-structure

    function isMine($model = null, $id = null, $usermodel = 'User', $foreignkey = 'user_id')
    {
        if (empty($model)) {
            // default model is first item in $this->uses array
            $model = $this->uses[0];
        }

        if (empty($id)) {
            if (!empty($this->passedArgs['id'])) {
                $id = $this->passedArgs['id'];
            } elseif (!empty($this->passedArgs[0])) {
                $id = $this->passedArgs[0];
            }
        }

        if (is_array($id)) {
            foreach ($id as $i) {
                if (!$this->_isMine($model, $i, $usermodel, $foreignkey)) {
                    return false;
                }
            }

            return true;
        }

        return $this->_isMine($model, $id, $usermodel, $foreignkey);
    }


    function _isMine($model, $id, $usermodel = 'User', $foreignkey = 'user_id')
    {

        $userId = AuthComponent::user('user_id'); // this is set on successful login

        if (isset($this->$model)) {
            $model = $this->$model;
        } else {
            $model = ClassRegistry::init($model);
        }

        //read model
        if (!($record = $model->read(null, $id))) {
            return false;
        }

        //get foreign key
        if ($usermodel == $model->alias) {
            if ($record[$model->alias][$model->primaryKey] == $userId) {
                return true;
            }
        } elseif ($record[$model->alias][$foreignkey] == $userId) {
            return true;
        }

        return false;
    }
}