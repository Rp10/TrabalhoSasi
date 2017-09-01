<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use DebugKit\Database\Log\DebugLog;
use DebugKit\Log\Engine\DebugKitLog;

/**
 * Historicos Controller
 *
 * @property \App\Model\Table\HistoricosTable $Historicos
 */
class HistoricosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Objetos', 'Users']
        ];
        $historicos = $this->paginate($this->Historicos
            ->query()
            ->where('Historicos.user_id = '.$this->Auth->user('id'))
        );

        $this->set(compact('historicos'));
        $this->set('_serialize', ['historicos']);
    }

    /**
     * View method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        $historico = $this->Historicos->get($id, [
            'contain' => ['Objetos', 'Users']
        ]);

        $this->set('historico', $historico);
        $this->set('_serialize', ['historico']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historico = $this->Historicos->newEntity();
        if ($this->request->is('post')) {
            $historico = $this->Historicos->patchEntity($historico, $this->request->data);
            $historico->user_id = $this->Auth->user('id');

            if ($this->Historicos->save($historico)) {
                $this->Flash->success(__('The historico has been saved.'),['key'=>'success']);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The historico could not be saved. Please, try again.'),['key'=>'error']);
            }
        }
        
        $objetos = $this->Historicos->Objetos->find('list', ['limit' => 200])->where('Objetos.user_id = '.$this->Auth->user('id'));
        $users = $this->Historicos->Users->find('list', ['limit' => 200]);
        $this->set(compact('historico', 'objetos', 'users'));
        $this->set('_serialize', ['historico']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historico = $this->Historicos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historico = $this->Historicos->patchEntity($historico, $this->request->data);
            if ($this->Historicos->save($historico)) {
                $this->Flash->success(__('The historico has been saved.'),['key'=>'success']);

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The historico could not be saved. Please, try again.'),['key'=>'error']);
            }
        }
        $objetos = $this->Historicos->Objetos->find('list', ['limit' => 200]);
        $users = $this->Historicos->Users->find('list', ['limit' => 200]);
        $this->set(compact('historico', 'objetos', 'users'));
        $this->set('_serialize', ['historico']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historico = $this->Historicos->get($id);
        if ($this->Historicos->delete($historico)) {
            $this->Flash->success(__('The historico has been deleted.'),['key'=>'success']);
        } else {
            $this->Flash->error(__('The historico could not be deleted. Please, try again.'),['key'=>'error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
