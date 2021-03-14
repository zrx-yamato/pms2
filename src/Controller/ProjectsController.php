<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AuthController
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
                    'Projects.is_delete' => 0,
                    'Projects.add_user_id' => $user->id,
                ],
                'contain' => ['Companies', 'Personnels', 'Users', 'Updaters']
            ];
        //閲覧者権限の場合
        } else {
            $this->paginate = [
                'conditions' => [
                    'Projects.is_delete' => 0,
                ],
                'contain' => ['Companies', 'Personnels', 'Users', 'Updaters']
            ];
        }
        $projects = $this->paginate($this->Projects);

        $this->set(compact('projects', 'user'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //User情報の取得
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));

        $project = $this->Projects->get($id, [
            'contain' => [
                'Companies', 'Personnels', 'Users', 'Updaters', 
                'Estimates' => [
                    'Users', 'Updaters', 'Statuses'
                ], 
                'Tasks' => [
                    'Users', 'Updaters', 'Personnels', 'Statuses', 'Projects'
                ]
            ]
        ]);

        $this->set(compact('project', 'user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            $project->create_at = date("Y-m-d H:i:s");
            $project->add_user_id = $this->Auth->user('id');
            $project->add_update_id = $this->Auth->user('id');
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('プロジェクトを追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $companies = $this->Projects->Companies->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $personnels = $this->Projects->Personnels->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $this->set(compact('project', 'companies', 'personnels', 'addUsers', 'addUpdates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            $project->add_update_id = $this->Auth->user('id');
            $project->update_at = date("Y-m-d H:i:s");
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('プロジェクトを更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $companies = $this->Projects->Companies->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $personnels = $this->Projects->Personnels->find('list', [
            'conditions' => ['is_delete' => 0],
            'limit' => 200
        ]);
        $this->set(compact('project', 'companies', 'personnels', 'addUsers', 'addUpdates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            $project->is_delete = 1;
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('プロジェクトを削除しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('削除出来ませんでした。もう一度やり直してください。'));
        }
        // $this->request->allowMethod(['post', 'delete']);
        // $project = $this->Projects->get($id);
        // if ($this->Projects->delete($project)) {
        //     $this->Flash->success(__('プロジェクトを削除しました。'));
        // } else {
        //     $this->Flash->error(__('削除出来ませんでした。項目を見直してください。'));
        // }

        return $this->redirect(['action' => 'index']);
    }
}
