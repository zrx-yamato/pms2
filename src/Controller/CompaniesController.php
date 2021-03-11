<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 *
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompaniesController extends AuthController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['Companies.is_delete' => 0]
        ];
        $companies = $this->paginate($this->Companies);

        $this->set(compact('companies'));
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Personnels', 'Projects']
        ]);

        $this->set('company', $company);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $company = $this->Companies->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            $company->create_at = date("Y-m-d H:i:s");
            $company->add_user_id = $this->Auth->user('id');
            $company->add_update_id = $this->Auth->user('id');
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('関連会社を追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $this->set(compact('company'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            $company->update_at = date("Y-m-d H:i:s");
            $company->add_update_id = $this->Auth->user('id');
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('関連会社を更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存出来ませんでした。項目を見直してください。'));
        }
        $this->set(compact('company'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            $company->is_delete = 1;
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('関連会社を削除しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('削除出来ませんでした。もう一度やり直してください。'));
        }
        // $this->request->allowMethod(['post', 'delete']);
        // $company = $this->Companies->get($id);
        // if ($this->Companies->delete($company)) {
        //     $this->Flash->success(__('関連会社を削除しました。'));
        // } else {
        //     $this->Flash->error(__('削除出来ませんでした。もう一度やり直してください。'));
        // }

        return $this->redirect(['action' => 'index']);
    }
}
