<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Personnels Controller
 *
 * @property \App\Model\Table\PersonnelsTable $Personnels
 *
 * @method \App\Model\Entity\Personnel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonnelsController extends AuthController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $personnels = $this->paginate($this->Personnels);

        $this->set(compact('personnels'));
    }

    /**
     * View method
     *
     * @param string|null $id Personnel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personnel = $this->Personnels->get($id, [
            'contain' => ['Companies', 'Projects', 'Tasks']
        ]);

        $this->set('personnel', $personnel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personnel = $this->Personnels->newEntity();
        if ($this->request->is('post')) {
            $personnel = $this->Personnels->patchEntity($personnel, $this->request->getData());
            if ($this->Personnels->save($personnel)) {
                $this->Flash->success(__('The personnel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personnel could not be saved. Please, try again.'));
        }
        $companies = $this->Personnels->Companies->find('list', ['limit' => 200]);
        $this->set(compact('personnel', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Personnel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personnel = $this->Personnels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personnel = $this->Personnels->patchEntity($personnel, $this->request->getData());
            if ($this->Personnels->save($personnel)) {
                $this->Flash->success(__('The personnel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personnel could not be saved. Please, try again.'));
        }
        $companies = $this->Personnels->Companies->find('list', ['limit' => 200]);
        $this->set(compact('personnel', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Personnel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personnel = $this->Personnels->get($id);
        if ($this->Personnels->delete($personnel)) {
            $this->Flash->success(__('The personnel has been deleted.'));
        } else {
            $this->Flash->error(__('The personnel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
