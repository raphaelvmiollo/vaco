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
     * 
     */
    public function alunoList() {
        $Class = new ClassificationsController();
        $classif = $Class->getClassifications();

        $this->set('nome', $this->Auth->user('name'));
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities->find("all",
                ['conditions' => ['Activities.user_id' => $this->Auth->user('iduser')]])));
        $this->set(compact('activities', 'classif'));
        $this->set('_serialize', ['activities']);
    }

    /**
     * 
     * @return type
     */
    public function alunoAdd() {
        $Class = new ClassificationsController();
        $this->set('nome', $this->Auth->user('name'));
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success('A atividade foi enviada com sucesso.');
                return $this->redirect(['action' => 'alunoList']);
            } else {
                $this->Flash->error('A Atividade não pode ser enviada. Por favor tente mais tarde.');
            }
        }
        $classifications = $Class->getClassifications();

        $this->set(compact('activity', 'classifications'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * 
     */
    public function coordList() {
        $Class = new ClassificationsController();
        $classif = $Class->getClassifications();

        $this->set('nome', $this->Auth->user('name'));
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities->find("all")));
               // ['conditions' => ['Activities.user_id' => $this->Auth->user('course_id')]])));
        $this->set(compact('activities', 'classif'));
        $this->set('_serialize', ['activities']);
    }

    /**
     * 
     */
    public function colList() {
        $Class = new ClassificationsController();
        $User = new UsersController();
        $classif = $Class->getClassifications();
        $user = $User->getUsers();
        
        $this->set('nome', $this->Auth->user('name'));
        
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate($this->Activities->find("all")));
               // ['conditions' => ['Activities.user_id' => $this->Auth->user('course_id')]])));
        $this->set(compact('activities', 'classif', 'user'));
        $this->set('_serialize', ['activities']);
    }
}
