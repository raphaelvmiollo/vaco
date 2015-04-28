<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Avaliations Controller
 *
 * @property \App\Model\Table\AvaliationsTable $Avaliations
 */
class AvaliationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('avaliations', $this->paginate($this->Avaliations));
        $this->set('_serialize', ['avaliations']);
    }

    /**
     * View method
     *
     * @param string|null $id Avaliation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $avaliation = $this->Avaliations->get($id, [
            'contain' => ['Activities']
        ]);
        $this->set('avaliation', $avaliation);
        $this->set('_serialize', ['avaliation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $avaliation = $this->Avaliations->newEntity();
        if ($this->request->is('post')) {
            $avaliation = $this->Avaliations->patchEntity($avaliation, $this->request->data);
            if ($this->Avaliations->save($avaliation)) {
                $this->Flash->success('The avaliation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The avaliation could not be saved. Please, try again.');
            }
        }
        $this->set(compact('avaliation'));
        $this->set('_serialize', ['avaliation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Avaliation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $avaliation = $this->Avaliations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $avaliation = $this->Avaliations->patchEntity($avaliation, $this->request->data);
            if ($this->Avaliations->save($avaliation)) {
                $this->Flash->success('The avaliation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The avaliation could not be saved. Please, try again.');
            }
        }
        $this->set(compact('avaliation'));
        $this->set('_serialize', ['avaliation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Avaliation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $avaliation = $this->Avaliations->get($id);
        if ($this->Avaliations->delete($avaliation)) {
            $this->Flash->success('The avaliation has been deleted.');
        } else {
            $this->Flash->error('The avaliation could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
