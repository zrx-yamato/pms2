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
        //User情報の取得
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));

        $this->paginate = [
            'conditions' => ['Estimates.is_delete' => 0],
            'contain' => ['Projects', 'Users', 'Updaters', 'Statuses']
        ];
        $estimates = $this->paginate($this->Estimates);

        $this->set(compact('estimates', 'user'));
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
        //User情報の取得
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));
        
        $estimate = $this->Estimates->get($id, [
            'contain' => ['Projects', 'Users', 'Updaters', 'Statuses']
        ]);

        $this->set(compact('estimate', 'user'));
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
            $estimate->create_at = date("Y-m-d H:i:s");
            $estimate->add_user_id = $this->Auth->user('id');
            $estimate->update_user_id = $this->Auth->user('id');
            if ($this->Estimates->save($estimate)) {
                $this->Flash->success(__('見積もりを追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $projects = $this->Estimates->Projects->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $addUsers = $this->Estimates->Users->find('list', ['limit' => 200]);
        $updateUsers = $this->Estimates->Users->find('list', ['limit' => 200]);
        $statuses = $this->Estimates->Statuses->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
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
            $estimate->update_user_id = $this->Auth->user('id');
            $estimate->update_at = date("Y-m-d H:i:s");
            if ($this->Estimates->save($estimate)) {
                $this->Flash->success(__('見積もりを更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $projects = $this->Estimates->Projects->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $addUsers = $this->Estimates->Users->find('list', ['limit' => 200]);
        $updateUsers = $this->Estimates->Users->find('list', ['limit' => 200]);
        $statuses = $this->Estimates->Statuses->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
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
        $estimate = $this->Estimates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estimate = $this->Estimates->patchEntity($estimate, $this->request->getData());
            $estimate->is_delete = 1;
            if ($this->Estimates->save($estimate)) {
                $this->Flash->success(__('見積もりを削除しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('削除出来ませんでした。もう一度やり直してください。'));
        }
        // $this->request->allowMethod(['post', 'delete']);
        // $estimate = $this->Estimates->get($id);
        // if ($this->Estimates->delete($estimate)) {
        //     $this->Flash->success(__('見積もりを削除しました。'));
        // } else {
        //     $this->Flash->error(__('削除出来ませんでした。項目を見直してください。'));
        // }

        return $this->redirect(['action' => 'index']);
    }
}
