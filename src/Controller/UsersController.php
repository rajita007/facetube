<?php
namespace App\Controller;

use App\Controller\AppController;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
     public $temp;
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userId = $this->Auth->user('id');
        $user = $this->Users->findById($userId)->first();
        $this->loadModel('Messages');

        $messages=$this->Messages->find()->where(['receiver_id'=>$userId])->contain('Senders')->all();
        $this->loadModel('Friends');

        $friends=$this->Friends->find()->where(['OR'=>[['receiver_id'=>$userId],['sender_id'=>$userId]],'Friends.status'=>1])->contain(['Senders','Receivers'])->toArray();

        $this->set('user', $user);
        $this->set('messages',$messages);
        $this->set('friends',$friends);
        $friendRequests=$this->Friends->find()->where(['receiver_id'=>$userId,'Friends.status'=>0])->contain('Senders')->toArray();
        
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Friends');

        $friends=$this->Friends->find()->where(['sender_id'=>$id])->contain('Receivers')->toArray();
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Likes', 'Notifications']
        ]);


        $this->set('user', $user);
        $this->set('friends',$friends);
        // $this->set('userId',$temp);
        // $post=$this->request->getData();
        // pr($post);
        // $message = $this->Messages->newEntity();
        // if ($this->request->is('post')) {
        //     $message = $this->Messages->patchEntity($message, $this->request->getData());
        //      $message['sender_id']=$this->Auth->user('id');
        //     if ($this->Messages->save($message)) {
        //         $this->Flash->success(__('The message has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The message could not be saved. Please, try again.'));
        // }
        // $senders = $this->Messages->Senders->find('list', ['limit' => 200]);
        // $receivers = $this->Messages->Receivers->find('list', ['limit' => 200]);
        // $this->set(compact('message', 'senders', 'receivers'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.

     */
    public function add()
    { $this->viewBuilder()->setLayout('login-default');
     $data= $this->request->getData();
        $user = $this->Users->newEntity();



        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user,$data);
            $user['status']=1;
            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }
    public function initialize()
    {
        Parent::initialize();
        $this->Auth->allow(['add', 'login','register']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }


    public function message(){

        $data=$this->request->getData();
        $data['sender_id']=$this->Auth->user('id');
        $this->loadModel('Messages');
        $message = $this->Messages->newEntity();

        
            $message = $this->Messages->patchEntity($message, $data);

            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                 //return $this->redirect(['action' => 'vie']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        






    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
{
  $this->viewBuilder()->setLayout('login-default');
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            $role=$this->Auth->user('role_id');

            if($role===1)
            {
                return $this->redirect(["controller"=>'Users','action'=>'index']);
            }
            else
            {
                //$this->Auth->deny(["controller"=>'Users' ,'action'=>['index','view','add','edit','delete','login']]);
                return $this->redirect(["controller"=>'Users','action'=>'index']);
            }
        }
        $this->Flash->error('Your username or password is incorrect.');
    }
}
public function logout()
{
    $this->Flash->success('You are now logged out.');
    return $this->redirect($this->Auth->logout());
}
public function isAuthorized($user)
{


    // The add and tags actions are always allowed to logged in users.
   //$user = $this->Auth->identify();

            //$this->Auth->setUser($user);
    $role=$this->Auth->user('role_id');

            if($role===1)
            {
                return true;
            }
            else
            {
                $this->redirect(["controller"=>'Messages']);


            }

}
public function friend(){
  $data=$this->request->getData();
  
  $this->loadModel('Friends');
  $friend = $this->Friends->newEntity();
  $friend['sender_id']=$this->Auth->user('id');
  $friend['receiver_id']=$data['receiver_id'];
  $friend['status']=0;
  
        if ($this->request->is('post')) {
            $friend = $this->Friends->patchEntity($friend, $data);
            
            if ($this->Friends->save($friend)) {
              
                //$this->Flash->success(__('The friend has been saved.'));

                
            }
            //$this->Flash->error(__('The friend could not be saved. Please, try again.'));
        }
    


}
 public function searchData()
    {

    }
    public function ajaxSearch($searchText){
      // pr($searchText); die;
      $this->viewBuilder()->setLayout('searchResult-default');
      // $post=$this->request->getData();
      //pr($post);die;
      // $query=$this->Users-findByUsername($post['description']);
      // pr($query); die;
       $user = $this->Users->find()->where(['name'=>$searchText])->toArray();
      $this->set('user',$user);
      
      // $this->redirect(['controller'=>'Users','action'=>'add','ajax_search']);
      // return $this->redirect()->view()
      }
      public function search(){} 

  public function register()

    {
        $this->viewBuilder()->setLayout('login-default');
        // pr(WWW_ROOT); die();
        $data = $this->request->getData();
        $data['status']=1;
        $data['role_id']=1;


        if($this->request->is('post')){
            // pr($data);die;
            if(isset($data['photo'])){
                $imageName = time().$data['photo']['name'];
                // pr($imageName); die;
                if(move_uploaded_file($data['photo']['tmp_name'],WWW_ROOT . 'img/uploads/' .$imageName )) {
                    $data['photo'] = 'img/uploads/'.$imageName;

                }

                // unset($data['users']['photo']);
            }


            // pr($data['users']['photo']); die('sss');
            $user=$this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $data);

           // pr($user); die('ss');
              if($this->Users->save($user))
               {
                if($this->Flash->success('You are registered and can login'));
                return $this->redirect(['action' => 'login']);
               }
             else
                {
                  if($this->Flash->error('You are not registered'));
                }

           }
           $this->set(compact('user'));
           $this->set('_serialize',['user']);
    }

   
}
