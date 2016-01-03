<?php
App::uses('Topic', 'Model');


class PostsController extends AppController {

	var $name = 'Posts';


	function index() {


        $this->layout = 'posts_index';

        $this->loadModel('Category');

        $this->set('states',$this->Category->find('list'));

        //get min date and max date

        $dates = $this->Post->query("select min(post_date) as earliest, max(post_date) as latest from posts");

        $this->set('dates', $dates);

        $this->set('posts', $this->Paginator->paginate());


	}


//below i list in addition to the post a list of any posts that reply to this post
//default layout
	function view($id = null) {

        $this->layout = 'posts_view';

		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}

        $returned = $this->Post->read(null, $id);

        $this->set('post', $returned);


      $this->set('replies', $this->Post->find('all', array(

            'conditions' => array('Post.parent_id' => $returned['Post']['post_id'])

        )));

	}

	function add()
    {

        $this->loadModel('Category');

        $result = $this->Category->find('list');

        $this->set('pagecontent', $result);

        if (!empty($this->data)) {

            $this->Post->create();

            if ($this->Post->save($this->data)) {

                $this->Session->setFlash(__('The post has been saved', true));

                $this->redirect(array('action' => 'index'));

            } else {

                $this->redirect($this->referer());

                $this->Session->setFlash(__('The post could not be saved. Please, try again.', true));

            }
        }
    }




//restrict function to owner of post and admin
    function edit($id = null)
    {


        if (!$id && empty($this->data)) {

            $this->Session->setFlash(__('Invalid post', true));

            $this->redirect(array('action' => 'index'));

        }

        if ($this->request->is('post') || $this->request->is('put')) {


                $this->Post->id = $this->data['Post']['post_id'];


                if ($this->Post->save(

                    array('post_topic' => $this->data['Post']['post_topic'],

                        'post_content' => $this->data['Post']['post_content'])
                )
                ) {

                    $this->Session->setFlash(__('The edit has been saved', true));

                    $this->redirect(array('action' => 'index'));

                } else {

                    $this->Session->setFlash(__('The edit could not be saved', true));

                    $this->redirect($this->referer());

                }


        }
        if (empty($this->data)) {

            $this->data = $this->Post->read(null, $id);

        }


    }



	function delete($id = null) {


        if (!$id) {
			$this->Session->setFlash(__('Invalid id for post', true));
			$this->redirect(array('action'=>'index'));
		}
        if ((AuthComponent::user('role_id') == 2) && ($this->Post->delete($id))) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted (available only to administrator accounts).', true));

        $this->redirect( $this->referer() );


	}


        function search() {
            $this->layout = 'default';
            if ($this->request->is('put') || $this->request->is('post')) {
                //n.b.  Post Redirect Get pattern
            //print_r($this->params['data']);
            //print_r($this->request->data);
            return $this->redirect(array(
                '?' => array(
                    'q' => $this->request->data('Post.searchQuery'),
                    'r' => $this->request->data('range_input'),
                    's' => $this->request->data('range_input2'),
                    't' => $this->request->data('Post.categoryQuery')
                )
            ));
        }
        $this->Post->recursive = 0;

            $searchQuery = $this->request->query('q');

            $minQuery = $this->request->query('r');

            $maxQuery = $this->request->query('s');

            $catQuery = $this->request->query('t');

        $this->Paginator->settings = array(
            'Post' => array(
                'limit' => 10,
                'findType' => 'search',
                'searchQuery' => $searchQuery,
                'minQuery' => $minQuery,
                'maxQuery' => $maxQuery,
                'categoryQuery' => $catQuery
            )
        );
            if(!isset($dates)){

            $dates = $this->Post->query("select min(post_date) as earliest, max(post_date) as latest from posts");
            $this->set('dates', $dates);

            }
            

            $this->loadModel('Category');

            $this->set('states',$this->Category->find('list'));//for categories drop down

            $this->set('posts', $this->Paginator->paginate());

            $this->set('searchQuery', $searchQuery);

            $this->set('minQuery', $minQuery);

            $this->set('maxQuery', $maxQuery);

            $this->set('categoryQuery', $catQuery);

            $this->render('index');
    }


    function reply($id = null)
    {
        $this->layout = 'posts_reply';

        if (!empty($this->data)) {


                $loggedInUser = AuthComponent::user();

                $userId = $loggedInUser['user_id'];

                $subject = $this->Post->find('first', array(
                    'conditions' => array('Post.post_id' => $id)
                ));

                           $this->Post->create();

                $reply = array('Post' => array(

                    'post_content' => $this->data['Post']['post_content'],
                    'post_date' => (new DateTime())->format('Y-m-d'),

                    'post_cat' => $subject['Post']['post_cat'],
                    'post_topic' => $subject['Post']['post_topic'],

                    'post_by' =>  $userId,
                    'parent_id' => $id
                ));


            if ($this->Post->save($reply) ){

                    $this->Session->setFlash(__('The reply has been saved', true));

                    $this->redirect(array('action' => 'index'));

                } else {

                    $this->Session->setFlash(__('The reply could not be saved. Please, try again.', true));

                    $this->redirect(array('action' => 'index'));
                }



        }

    }


    public function beforeFilter()
    {
        parent::beforeFilter();

        // $this->Auth->allow('');
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

                if ((($role == 2) || ($this->isMine()))) {

                    $this->Auth->allow();


                } else {

                    $this->Session->setFlash(__('Insufficient Privileges', true));

                    $this->redirect(array('action' => 'index'));

                    return false;

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


    function isMine($model = null, $id = null)
    {
        if (empty($model)) {

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

                if (!$this->_isMine($model, $i)) {

                    return false;
                }
            }

            return true;
        }

        return $this->_isMine($model, $id);
    }


    function _isMine($model, $id)
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

        //get author

        if ($record['Post']['post_by'] == $userId) {

            return true;
        }

        return false;
    }


}
