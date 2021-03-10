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
        $this->paginate = [
            'contain' => ['Companies', 'Personnels', 'Users', 'Updaters']
        ];
        $projects = $this->paginate($this->Projects);

        $this->set(compact('projects'));
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

        $this->set('project', $project);
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
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $companies = $this->Projects->Companies->find('list', ['limit' => 200]);
        $personnels = $this->Projects->Personnels->find('list', ['limit' => 200]);
        $addUsers = $this->Projects->Users->find('list', ['limit' => 200]);
        $addUpdates = $this->Projects->Users->find('list', ['limit' => 200]);
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
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $companies = $this->Projects->Companies->find('list', ['limit' => 200]);
        $personnels = $this->Projects->Personnels->find('list', ['limit' => 200]);
        $addUsers = $this->Projects->Users->find('list', ['limit' => 200]);
        $addUpdates = $this->Projects->Users->find('list', ['limit' => 200]);
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
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
