<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 */
class ActivitiesController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities));
        $this->set('_serialize', ['activities']);
    }
    
    public function alunoList() {
        $this->set('nome', $this->Auth->user('name'));
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities->find('all', 
                ['conditions' => ['Activities.users_iduser' => $this->Auth->user('iduser')]])));
        $this->set('_serialize', ['activities']);
        $this->set('msg', ['123']);
    }
    
    public function alunoAdd() {
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
        $classifications = $this->Activities->Classifications;
        $this->set(compact('activity', 'classifications'));
        $this->set('_serialize', ['activity']);
    }
    
    public function editcolegiado() {
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

    public function coordlist() {
        $this->set('nome', $this->Auth->user('name'));
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities)); //put a condition
        $this->set('_serialize', ['activities']);
    }
    
    public function coordAvalia() {
        $this->set('nome', $this->Auth->user('name'));
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities));
        $this->set('_serialize', ['activities']);
        $this->set('msg', ['123']);
    }
    
    public function coordedit($id = null) {
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
