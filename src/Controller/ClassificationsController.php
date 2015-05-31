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
    public function coordList(){
        $this->set('nome', $this->Auth->user('name'));
        $this->set('classifications', $this->paginate($this->Classifications));
        $this->set('_serialize', ['classifications']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function coordAdd(){
        $this->set('nome', $this->Auth->user('name'));
        $classification = $this->Classifications->newEntity();
        if ($this->request->is('post')) {
            $classification = $this->Classifications->patchEntity($classification, $this->request->data);
            if ($this->Classifications->save($classification)) {
                $this->Flash->success('The classification has been saved.');
                return $this->redirect(['action' => 'coordList']);
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
    public function coordEdit($id = null){
        $this->set('nome', $this->Auth->user('name'));
        $classification = $this->Classifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classification = $this->Classifications->patchEntity($classification, $this->request->data);
            if ($this->Classifications->save($classification)) {
                $this->Flash->success('The classification has been saved.');
                return $this->redirect(['action' => 'coordList']);
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
    public function coordDelete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $classification = $this->Classifications->get($id);
        if ($this->Classifications->delete($classification)) {
            $this->Flash->success('The classification has been deleted.');
        } else {
            $this->Flash->error('The classification could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'coordList']);
    }
}
