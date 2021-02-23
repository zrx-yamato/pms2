<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estimates Controller
 *
 * @property \App\Model\Table\EstimatesTable $Estimates
 *
 * @method \App\Model\Entity\Estimate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstimatesController extends AuthController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'Users', 'Statuses']
        ];
        $estimates = $this->paginate($this->Estimates);

        $this->set(compact('estimates'));
    }

    /**
     * View method
     *
     * @param string|null $id Estimate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estimate = $this->Estimates->get($id, [
            'contain' => ['Projects', 'Users', 'Statuses']
        ]);

        $this->set('estimate', $estimate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estimate = $this->Estimates->newEntity();
        if ($this->request->is('post')) {
            $estimate = $this->Estimates->patchEntity($estimate, $this->request->getData());
            if ($this->Estimates->save($estimate)) {
                $this->Flash->success(__('The estimate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estimate could not be saved. Please, try again.'));
        }
        $projects = $this->Estimates->Projects->find('list', ['limit' => 200]);
        $addUsers = $this->Estimates->Users->find('list', ['limit' => 200]);
        $updateUsers = $this->Estimates->Users->find('list', ['limit' => 200]);
        $statuses = $this->Estimates->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('estimate', 'projects', 'addUsers', 'updateUsers', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estimate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estimate = $this->Estimates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estimate = $this->Estimates->patchEntity($estimate, $this->request->getData());
            if ($this->Estimates->save($estimate)) {
                $this->Flash->success(__('The estimate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estimate could not be saved. Please, try again.'));
        }
        $projects = $this->Estimates->Projects->find('list', ['limit' => 200]);
        $addUsers = $this->Estimates->Users->find('list', ['limit' => 200]);
        $updateUsers = $this->Estimates->Users->find('list', ['limit' => 200]);
        $statuses = $this->Estimates->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('estimate', 'projects', 'addUsers', 'updateUsers', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estimate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estimate = $this->Estimates->get($id);
        if ($this->Estimates->delete($estimate)) {
            $this->Flash->success(__('The estimate has been deleted.'));
        } else {
            $this->Flash->error(__('The estimate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
