<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Statuses Controller
 *
 * @property \App\Model\Table\StatusesTable $Statuses
 *
 * @method \App\Model\Entity\Status[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatusesController extends AuthController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['Statuses.is_delete' => 0]
        ];
        $statuses = $this->paginate($this->Statuses);

        $this->set(compact('statuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $status = $this->Statuses->get($id, [
            'contain' => ['Estimates', 'Tasks']
        ]);

        $this->set('status', $status);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $status = $this->Statuses->newEntity();
        if ($this->request->is('post')) {
            $status = $this->Statuses->patchEntity($status, $this->request->getData());
            $status->create_at = date("Y-m-d H:i:s");
            if ($this->Statuses->save($status)) {
                $this->Flash->success(__('ステータスを追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $this->set(compact('status'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $status = $this->Statuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Statuses->patchEntity($status, $this->request->getData());
            $status->update_at = date("Y-m-d H:i:s");
            if ($this->Statuses->save($status)) {
                $this->Flash->success(__('ステータスを更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $this->set(compact('status'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $status = $this->Statuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Statuses->patchEntity($status, $this->request->getData());
            $status->is_delete = 1;
            if ($this->Statuses->save($status)) {
                $this->Flash->success(__('ステータスを削除しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('削除出来ませんでした。もう一度やり直してください。'));
        }
        // $this->request->allowMethod(['post', 'delete']);
        // $status = $this->Statuses->get($id);
        // if ($this->Statuses->delete($status)) {
        //     $this->Flash->success(__('ステータスを削除しました。'));
        // } else {
        //     $this->Flash->error(__('削除出来ませんでした。もう一度やり直してください。'));
        // }

        return $this->redirect(['action' => 'index']);
    }
}
