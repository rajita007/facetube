<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler', [
    'enableBeforeRedirect' => false,
]);


        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        //$this->Auth->allow(['display', 'view', 'index']);
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see htt$this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display', 'view', 'index']);ps://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        

    }
    public function beforeFilter(Event $event)
    {   
        $user = $this->Auth->user();
        $friendRequests=  null;

        if($user){
        $this->loadModel("Notifications");
        // $typeName=$this->Notifications->find()->toArray();
            $notifications=$this->Notifications->findByUserId($user['id'])
                                                ->contain(['Messages.Senders','Friends.Receivers','Likes','Posts.Senders'])
                                                ->all();
            
            // 'Messages.Senders','Likes','Friends.Receivers'
            
        $this->set('notifications',$notifications);
            $this->loadModel('Friends'); 
            $friendRequests=$this->Friends->find()->where(['receiver_id'=>$user['id'],'Friends.status'=>0])->contain('Senders')->toArray();

            $this->set('friendRequests',$friendRequests);
        }
                
    
    // pr($userId);die;
    // $notifications=$this->Notifications->find()->contain(['Users','Messages'])->toArray();
        // $this->set('notifications',$notifications);
    }
    
}
