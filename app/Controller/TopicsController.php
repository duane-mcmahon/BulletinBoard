<?php
class TopicsController extends AppController {

    var $name = 'Topics';

    //var $components = array('Session');

    function index() {
        $this->layout = 'topics_index';
        $this->Topic->recursive = 0;
        $this->set('topics', $this->Paginator->paginate());
    }

    function view($id = null) {
        $this->layout = 'topics_view';
        if (!$id) {
            $this->Session->setFlash(__('Invalid topic', true));
            $this->redirect(array('action' => 'index'));
        }
        //add if possible the post
        $this->set('topic', $this->Topic->read(null, $id));
    }

    function add() {
        $this->loadModel('Category');
        $result = $this->Category->find('list');
        $this->set('pagecontent', $result);
        if (!empty($this->data)) {
            $this->Topic->create();
            if ($this->Topic->save($this->data)) {
                $this->Session->setFlash(__('The topic has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topic could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        $this->layout = 'topics_edit';
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid topic', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Topic->save($this->data)) {
                $this->Session->setFlash(__('The topic has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The topic could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Topic->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for topic', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Topic->delete($id)) {
            $this->Session->setFlash(__('Topic deleted', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('Topic was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    public function search() {
        if ($this->request->is('put') || $this->request->is('post')) {
            // poor man's Post Redirect Get behavior
            return $this->redirect(array(
                '?' => array(
                    'q' => $this->request->data('Topic.searchQuery')
                )
            ));
        }
        $this->Topic->recursive = 0;
        $searchQuery = $this->request->query('q');
        $this->Paginator->settings = array(
            'Topic' => array(
                'findType' => 'search',
                'searchQuery' => $searchQuery
            )
        );
        $this->set('topics', $this->Paginator->paginate());
        $this->set('searchQuery', $searchQuery);
        $this->render('index');
    }

    public function beforeFilter()
    {


        parent::beforeFilter();

        //$this->Auth->allow('add', 'login', 'logout');

        //$this->Auth->allow(array('*'));


    }


    public function isAuthorized($user = null)
    {

        //return parent::isAuthorized($user);

        $userId = $this->Auth->user('user_id');

        $role = $this->Auth->user('role_id');

        switch ($this->action) {

            case 'add':

                if ($role) {

                    $this->Auth->allow();

                }

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

                if ($role == 2) {

                    $this->Auth->allow();

                } else {

                    $this->Session->setFlash(__('Insufficient Privileges', true));

                    $this->redirect(array('action' => 'index'));

                    return false;


                }
                break;

            case 'view':

                if ($role) {

                    $this->Auth->allow();

                }

                break;

            case 'index':

                if ($role) {


                    $this->Auth->allow();

                }

                break;


        }


        return true;


    }



}

