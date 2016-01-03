<?php

class CategoriesController extends AppController
{

    var $name = 'Categories';
    var $components = array('Session', 'Paginator');

    function index()
    {
        $this->layout = 'categories_index';
        $this->Category->recursive = 0;
        $this->set('categories', $this->Paginator->paginate());
    }

    function view($id = null)
    {
        $this->layout = 'categories_view';
        if (!$id) {
            $this->Session->setFlash(__('Invalid category', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('category', $this->Category->read(null, $id));
    }

    function add()
    {
        $this->layout = 'categories_add';
        if (!empty($this->data)) {
            $this->Category->create();
            if ($this->Category->save($this->data)) {
                $this->Session->setFlash(__('The category has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
            }
        }
    }


    function edit($id = null)
    {

        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid category', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Category->save($this->data)) {
                $this->Session->setFlash(__('The category has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Category->read(null, $id);
        }
    }



    function delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for category', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Category->delete($id)) {
            $this->Session->setFlash(__('Category deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Category was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }


    public function beforeFilter()
    {


        parent::beforeFilter();

        $this->Auth->allow('index', 'view');
        //$this->Auth->allow('*');



    }

    function isAuthorized()
    {

        $role = $this->Auth->user('role_id');

        switch ($this->action) {

            case 'add':

                if ($role != 2) {

                    $this->Session->setFlash(__('Insufficient Privileges', true));

                    $this->redirect(array('action' => 'index'));

                    return false;

                } else {

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

                if ($role == 2) {

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



}




