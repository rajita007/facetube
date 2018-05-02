<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
* Posts Controller
*
* @property \App\Model\Table\PostsTable $Posts
*
* @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
*/
class PostsController extends AppController
{

  /**
  * Index method
  *
  * @return \Cake\Http\Response|void
  */
  public function index()
  {


    //$posts = $this->Posts->find()->contain(['Likes'])->all();
    $data = $this->Posts->find()->contain(['Senders',"Likes"])->toArray();
    //pr($data); die;
    //$this->set(compact('posts'));
    $this->set(compact('data'));


  }

  /**
  * View method
  *
  * @param string|null $id Post id.
  * @return \Cake\Http\Response|void
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    //$post = $this->Posts->find()->contain(['Likes'])->all();
    $post=$this->Posts->find()->where(['receiver_id'=>$id])->contain(['Senders','Likes'])->toArray();
    //pr($post); die;
    $this->set('post', $post);
    $this->set(compact('posts'));

  }

  /**
  * Add method
  *
  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add($id = null  )
  {


    $post = $this->Posts->newEntity();
    if ($this->request->is('post')) {
      $post = $this->Posts->patchEntity($post, $this->request->getData());
      //$this->set('_serialize', ['post','senders','receivers']);
      if ($this->Posts->save($post)) {
        $this->Flash->success(__('The post has been saved.'));
        $count++;
        //return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The post could not be saved. Please, try again.'));

      // $senders = $this->Posts->Senders->find('list', ['limit' => 200]);
      // $receivers = $this->Posts->Receivers->find('list', ['limit' => 200]);

      // pr($post);die;
      $this->set(compact('post', 'senders', 'receivers'));




    }
  }
  public function post($id = null)
  {
      $this->loadModel('Notifications');
    if($id){
      $this->set('receiver_id',$id);
    }
    $data=$this->request->getData();

    if ($this->request->is('post')) {



        // pr($data);die;
        if(isset($data['attach'])){
          $imageName = time().$data['attach']['name'];
          // pr($imageName);die;
          if(move_uploaded_file($data['attach']['tmp_name'],WWW_ROOT . 'img/uploads/' .$imageName )) {
            $data['attach'] = 'img/uploads/'.$imageName;

          }
          // pr($data);die;
          // unset($data['users']['photo']);
        }


        $post = $this->Posts->newEntity();
        $post= $this->Posts->patchEntity($post,$data);


        //$this->set('_serialize', ['post']);
        $post['sender_id']=$this->Auth->user('id');
        $post['receiver_id']=$id;
        $post['active'] = 1;

        if($this->Posts->save($post)) {
          $user=[];
       $new = $this->Notifications->newEntity();
       $user['user_id']=$post['receiver_id'];
       $user['notificationType_id']=3;
       $user['object_id']=$post->id;
       $new = $this->Notifications->patchEntity($new,$user);
       pr($new); die;
       if(!$this->Notifications->save($new)){

         throw new Exception("Error Processing Request");
       }
          return $this->redirect(['controller'=>'Users','action'=>'index']);
        }
      }



}
    /**
    * Edit method
    *
    * @param string|null $id Post id.
    * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null)
    {
      $post = $this->Posts->get($id, [
        'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
        $post = $this->Posts->patchEntity($post, $this->request->getData());
        if ($this->Posts->save($post)) {
          $this->Flash->success(__('The post has been saved.'));

          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The post could not be saved. Please, try again.'));
      }
      $senders = $this->Posts->Senders->find('list', ['limit' => 200]);
      $receivers = $this->Posts->Receivers->find('list', ['limit' => 200]);
      $this->set(compact('post', 'senders', 'receivers'));
    }

    /**
    * Delete method
    *
    * @param string|null $id Post id.
    * @return \Cake\Http\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function delete($id = null)
    {
      $this->request->allowMethod(['post', 'delete']);
      $post = $this->Posts->get($id);
      if ($this->Posts->delete($post)) {
        $this->Flash->success(__('The post has been deleted.'));
      } else {
        $this->Flash->error(__('The post could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
    }
    public function like(){
      $this->loadModel('Likes');

      $like = $this->Likes->newEntity();
      if ($this->request->is('post')) {
        $like= $this->Likes->patchEntity($like,$this->request->getData());
        //pr($like); die;
        //$this->set('_serialize', ['post']);

        // pr($post); die;
        if ($this->Likes->save($like)) {

        }
        $data['post_id']=$like['post_id'];
        $likes=$this->Likes->find()->where(['post_id'=>$data['post_id']])->all();
        //  pr($likes); die;
        $data = $this->Likes->find();

        $data=$data
        ->select(['post_id' => $data->func()->count('post_id')])
        ->where(['post_id' => $like['post_id']])
        ->toArray();

        $this->set('data',$data);
        $this->set('_serialize', ['data']);
      }
    }
  }
