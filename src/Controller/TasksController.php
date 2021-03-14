<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AuthController
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

        //編集者、管理者権限の場合
        if( $user->role_id > 2){
            $this->paginate = [
                'conditions' => [
                    'Tasks.is_delete' => 0,
                    'Tasks.add_user_id' => $user->id,
                ],
                'contain' => ['Statuses', 'Projects', 'Personnels', 'Users', 'Updaters'],
            ];
        //閲覧者権限の場合
        } else {
            $this->paginate = [
                'conditions' => ['Tasks.is_delete' => 0],
                'contain' => ['Statuses', 'Projects', 'Personnels', 'Users', 'Updaters'],
            ];
        }
        $tasks = $this->paginate($this->Tasks);

        $this->set(compact('tasks', 'user'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //User情報の取得
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));

        $task = $this->Tasks->get($id, [
            'contain' => ['Statuses', 'Projects', 'Personnels', 'Users', 'Updaters']
        ]);

        $this->set(compact('task', 'user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            $task->create_at = date("Y-m-d H:i:s");
            $task->add_user_id = $this->Auth->user('id');
            $task->add_update_id = $this->Auth->user('id');
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('タスクを追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $statuses = $this->Tasks->Statuses->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $projects = $this->Tasks->Projects->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $personnels = $this->Tasks->Personnels->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $this->set(compact('task', 'statuses', 'projects', 'personnels', 'addUsers', 'addUpdates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            $task->update_at = date("Y-m-d H:i:s");
            $task->add_update_id = $this->Auth->user('id');;
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('タスクを更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $statuses = $this->Tasks->Statuses->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $projects = $this->Tasks->Projects->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $personnels = $this->Tasks->Personnels->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $this->set(compact('task', 'statuses', 'projects', 'personnels', 'addUsers', 'addUpdates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            $task->is_delete = 1;
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('タスクを削除しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('削除出来ませんでした。もう一度やり直してください。'));
        }
        // $this->request->allowMethod(['post', 'delete']);
        // $task = $this->Tasks->get($id);
        // if ($this->Tasks->delete($task)) {
        //     $this->Flash->success(__('タスクを削除しまタスク'));
        // } else {
        //     $this->Flash->error(__('削除出来ませんでした。もう一度やり直してください。'));
        // }

        return $this->redirect(['action' => 'index']);
    }
}
