<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{


    public $helpers = array('Form', 'Html', 'Js', 'Session');


    public $components = array(
        'DebugKit.Toolbar', 'Paginator', 'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'display'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display'

            ),
            'authenticate' => array('Form' => array(
                'fields' => array(
                    'username' => 'user_name',
                    'password' => 'user_pass'
                ),
                'userModel' => 'User',

            )),
            'authorize' => 'Controller' //or: $this->Auth->authorize = 'Controller';//(below) critical line
        )
    );

    public function beforeRender()
    {
        $this->response->disableCache();
    }

    public function beforeFilter()
    {

        //AuthComponent::$sessionKey = false;
        //$this->Auth->authorize = 'Controller';//critical line
        $this->Paginator->settings=array(
            'limit'=>10
        );

    }

    public function isAuthorized()
    {

        //print_r($this->request->params);
        //print_r($this->params['data']);
        //print_r($this->request->data);
        return true;

    }


    /*
n.b.
     If  using $this->Auth->authorize = 'controller';
     then you will need to implement the isAuthorized
() function for app_controller.php as well.


     authenticate = Form is also critical
     */


}








