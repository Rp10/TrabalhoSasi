<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

/**
 * Objetos Controller
 *
 * @property \App\Model\Table\ObjetosTable $Objetos
 */
class ObjetosController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $objetos = $this->paginate($this->Objetos
        		->query()->where("user_id =".$this->Auth->user('id')));

        $this->set(compact('objetos'));
        $this->set('_serialize', ['objetos']);
    }

    /**
     * View method
     *
     * @param string|null $id Objeto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $objeto = $this->Objetos->get($id, [
            'contain' => ['Users', 'Historicos']
        ]);

        $this->set('objeto', $objeto);
        $this->set('_serialize', ['objeto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $objeto = $this->Objetos->newEntity();
        if ($this->request->is('post')) {
            $objeto = $this->Objetos->patchEntity($objeto, $this->request->data);
            $objeto->user_id = $this->Auth->user('id');
            $objeto->nome_obj = $this->request->data('nome_obj');
            if ($this->Objetos->save($objeto)) {
                $this->Flash->success(__('The objeto has been saved.'),['key'=>'success']);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The objeto could not be saved. Please, try again.'),['key'=>'error']);
            }
        }
        $this->set(compact('objeto', 'users'));
        $this->set('_serialize', ['objeto']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Objeto id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $objeto = $this->Objetos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $objeto = $this->Objetos->patchEntity($objeto, $this->request->data);
            if ($this->Objetos->save($objeto)) {
                $this->Flash->success(__('The objeto has been saved.'),['key'=>'success']);

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The objeto could not be saved. Please, try again.'),['key'=>'error']);
            }
        }
        $users = $this->Objetos->Users->find('list', ['limit' => 200]);
        $this->set(compact('objeto', 'users'));
        $this->set('_serialize', ['objeto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Objeto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $objeto = $this->Objetos->get($id);
        if ($this->Objetos->delete($objeto)) {
            $this->Flash->success(__('The objeto has been deleted.'),['key'=>'success']);
        } else {
            $this->Flash->error(__('The objeto could not be deleted. Please, try again.'),['key'=>'error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
