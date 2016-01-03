<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('Post', 'Model');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

    public $helpers = array('RenderHtml');

	public function display() {



		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}

        $this->loadModel('Category');

        //$cats = $this->Category->find('list', array('order'=> array('Category.cat_name' => 'ASC')));

        $cats = $this->Category->find('list');

        // print_r($cats);

        $posts = array();

        $index = 1;

        foreach ($cats as $key => $value) {
            $this->loadModel('Post');
            $threads = $this->Post->find('threaded', array(
                'fields' => array('post_id', 'Category.cat_name', 'Topic.topic_subject', 'parent_id'),
                'conditions' => array('Category.cat_name' => $value,
                    'Topic.topic_cat' => $key)
            ));;

            $posts[$index]['Category'] = $value;
            $posts[$index]['Threads'] = $threads;


            $index++;

        }

        $this->set('posts', $posts);

        $this->set(compact('page', 'subpage', 'title_for_layout'));

        $this->render(implode('/', $path));

    }

    public function beforeFilter()
    {


        parent::beforeFilter();


        $this->Auth->allow(array('display'));


    }


}
