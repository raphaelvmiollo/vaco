<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Classifications Controller
 *
 * @property \App\Model\Table\ClassificationsTable $Classifications
 */
class ClassificationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('classifications', $this->paginate($this->Classifications));
        $this->set('_serialize', ['classifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Classification id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classification = $this->Classifications->get($id, [
            'contain' => ['Activities']
        ]);
        $this->set('classification', $classification);
        $this->set('_serialize', ['classification']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classification = $this->Classifications->newEntity();
        if ($this->request->is('post')) {
            $classification = $this->Classifications->patchEntity($classification, $this->request->data);
            if ($this->Classifications->save($classification)) {
                $this->Flash->success('The classification has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The classification could not be saved. Please, try again.');
            }
        }
        $this->set(compact('classification'));
        $this->set('_serialize', ['classification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Classification id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classification = $this->Classifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classification = $this->Classifications->patchEntity($classification, $this->request->data);
            if ($this->Classifications->save($classification)) {
                $this->Flash->success('The classification has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The classification could not be saved. Please, try again.');
            }
        }
        $this->set(compact('classification'));
        $this->set('_serialize', ['classification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Classification id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classification = $this->Classifications->get($id);
        if ($this->Classifications->delete($classification)) {
            $this->Flash->success('The classification has been deleted.');
        } else {
            $this->Flash->error('The classification could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
