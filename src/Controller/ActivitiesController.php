<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 */
class ActivitiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities));
        $this->set('_serialize', ['activities']);
    }


    public function Aluno()
    {
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities));
        $this->set('_serialize', ['activities']);
    }

    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => ['Classifications', 'Avaliations']
        ]);
        $this->set('activity', $activity);
        $this->set('_serialize', ['activity']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success('The activity has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The activity could not be saved. Please, try again.');
            }
        }
        $classifications = $this->Activities->Classifications->find('list', ['limit' => 200]);
        $avaliations = $this->Activities->Avaliations->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'classifications', 'avaliations'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success('The activity has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The activity could not be saved. Please, try again.');
            }
        }
        $classifications = $this->Activities->Classifications->find('list', ['limit' => 200]);
        $avaliations = $this->Activities->Avaliations->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'classifications', 'avaliations'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activity = $this->Activities->get($id);
        if ($this->Activities->delete($activity)) {
            $this->Flash->success('The activity has been deleted.');
        } else {
            $this->Flash->error('The activity could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'administradorlistar']);
    }

    public function listar(){
         $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities));
        $this->set('_serialize', ['activities']);
        $this->set('msg', ['123']);
    }

    public function alunolistar(){
        $this->set('nome', $this->Auth->user('name'));
         $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities->find('all', array('conditions' => array('Activities.users_iduser' => $this->Auth->user('iduser'))))));
        $this->set('_serialize', ['activities']);
        $this->set('msg', ['123']);
    }


    public function editcolegiado(){$activity = $this->Activities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success('The activity has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The activity could not be saved. Please, try again.');
            }
        }
        $classifications = $this->Activities->Classifications->find('list', ['limit' => 200]);
        $avaliations = $this->Activities->Avaliations->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'classifications', 'avaliations'));
        $this->set('_serialize', ['activity']);}


        public function alunoadd()
    {
         $this->set('nome', $this->Auth->user('name'));
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success('The activity has been saved.');
                return $this->redirect(['action' => 'alunolistar']);
            } else {
                $this->Flash->error('The activity could not be saved. Please, try again.');
            }
        }
        $classifications = $this->Activities->Classifications->find('list', ['limit' => 200]);
        $avaliations = $this->Activities->Avaliations->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'classifications', 'avaliations'));
        $this->set('_serialize', ['activity']);
    }


    public function administradorlistar(){

         $this->set('nome', $this->Auth->user('name'));
         $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities));
        $this->set('_serialize', ['activities']);
        $this->set('msg', ['123']);
    }

 public function administradoradd()
    {
        $this->set('nome', $this->Auth->user('name'));
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success('The activity has been saved.');
                return $this->redirect(['action' => 'administradorlistar']);
            } else {
                $this->Flash->error('A atividade não pode ser salva.Por favor, tente novamente.');
            }
        }
        $classifications = $this->Activities->Classifications->find('list', ['limit' => 200]);
        $avaliations = $this->Activities->Avaliations->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'classifications', 'avaliations'));
        $this->set('_serialize', ['activity']);
    }

 public function administradoredit($id = null)
    {
         $this->set('nome', $this->Auth->user('name'));
        $activity = $this->Activities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success('The activity has been saved.');
                return $this->redirect(['action' => 'administradorlistar']);
            } else {
                $this->Flash->error('The activity could not be saved. Please, try again.');
            }
        }
        $classifications = $this->Activities->Classifications->find('list', ['limit' => 200]);
        $avaliations = $this->Activities->Avaliations->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'classifications', 'avaliations'));
        $this->set('_serialize', ['activity']);
    }

}
