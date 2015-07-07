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
     * @return type
     */
    public function alunoAdd() {
        $this->verifyAcess(1);
        $classification = new ClassificationsController();
        $avaliation = new AvaliationsController();

        $activity = $this->Activities->newEntity();
        $this->set('nome', $this->Auth->user('name'));
        $this->set('classifications', $classification->getDropClassifications());

        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            $activity->avaliation_id = $avaliation->generateAvaliation($activity['classification_id']);
            if ($this->Activities->save($activity)) {
                $this->Flash->success('A atividade foi enviada com sucesso.');
            } else {
                $avaliation->delete($activity->avaliation_id);
                $this->Flash->error('A Atividade não pode ser enviada. Por favor tente mais tarde.');
            }
            return $this->redirect(['action' => 'alunoList']);
        }
        $this->set(compact('activity'));
        $this->set('_serialize', ['activity']);
    }

    public function alunoView($id = null) {
        $this->verifyAcess(1);
        $this->set('nome', $this->Auth->user('name'));
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $activity = $this->paginate(
                $this->Activities->find("all", ['conditions' =>
                    ['Activities.idactivity' => $id]]));
        $this->set('activity', $activity->first());
        $this->set('_serialize', ['activity']);
    }

    /**
     * 
     */
    public function alunoList() {
        $this->verifyAcess(1);
        $Class = new ClassificationsController();
        $classif = $Class->getDropClassifications();

        $this->set('nome', $this->Auth->user('name'));
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations']
        ];
        $this->set('activities', $this->paginate(
                        $this->Activities->find("all", ['conditions' =>
                            ['activities.user_id' => $this->Auth->user('iduser')]])));
        $this->set(compact('activities', 'classif'));
        $this->set('_serialize', ['activities']);
    }

    /**
     * 
     */
    public function coordList() {
        $this->verifyAcess(3);
        $this->set('nome', $this->Auth->user('name'));
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations', 'Users']
        ];
        $this->set('activities', $this->paginate(
                        $this->Activities->find("all", ['join' =>
                            ['table' => 'Users',
                                'alias' => 'user',
                                'type' => 'INNER',
                                'foreignKey' => 'user_id',
                                'conditions' =>
                                ['user.iduser = activities.user_id']],
                            'conditions' => ['user.course_id' => $this->Auth->user('course_id')]
        ])));
        $this->set(compact('activities', 'classif', 'user'));
        $this->set('_serialize', ['activities']);
    }

    public function approveList() {
        $this->verifyAcess(3);
        $this->set('nome', $this->Auth->user('name'));
        
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations', 'Users']
        ];
       
        $conditions = ['aval.situation' => '1', 'users.course_id =' . $this->Auth->user('course_id')];
        
        $this->set('activities', $this->paginate(
                        $this->Activities->find("all", ['join' =>
                            ['table' => 'avaliations',
                                'alias' => 'aval',
                                'type' => 'INNER',
                                'foreignKey' => 'user_id',
                                'conditions' =>
                                ['aval.idavaliation = activities.avaliation_id']],
                            ['table' => 'Users',
                                'type' => 'INNER',
                                'foreignKey' => 'user_id',
                                'conditions' =>
                                ['Users.iduser = activities.user_id']],
                            'conditions' => $conditions])));

        $this->set(compact('activities', 'classif', 'user'));
        $this->set('_serialize', ['activities']);
    }

    /**
     * 
     */
    public function activityList() {
        $this->verifyAcess([2, 3]);
        $this->set('nome', $this->Auth->user('name'));
        $this->paginate = [
            'contain' => ['Classifications', 'Avaliations', 'Users']
        ];
        $conditions = ['aval.avaliator_id' => $this->Auth->user('iduser'), 'aval.situation' => 0];
        if ($this->Auth->user('type') === 3) {
            $conditions = ['aval.situation' => '-1', 'users.course_id =' . $this->Auth->user('course_id')];
        }
        $this->set('activities', $this->paginate(
                        $this->Activities->find("all", ['join' =>
                            ['table' => 'avaliations',
                                'alias' => 'aval',
                                'type' => 'INNER',
                                'foreignKey' => 'user_id',
                                'conditions' =>
                                ['aval.idavaliation = activities.avaliation_id']],
                            ['table' => 'users',
                                'type' => 'INNER',
                                'foreignKey' => 'user_id',
                                'conditions' =>
                                ['Users.iduser = activities.user_id']],
                            'conditions' => $conditions])));
        $this->set(compact('activities', 'classif', 'user'));
        $this->set('_serialize', ['activities']);
    }
    
    public function edit($idAvaliation, $hours){
        $this->verifyAcess(2);
        $activity = $this->Activities->find("all", ['conditions' =>
                                       ['activities.avaliation_id' => $idAvaliation]])->first();
        $activity = $this->Activities->patchEntity($activity, ['activity_hours' => $hours]);
        $this->Activities->save($activity);
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Avaliation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->verifyAcess(1);
        $avaliation = new AvaliationsController();
        $this->request->allowMethod(['post', 'delete']);
        $activity = $this->Activities->find("all", ['join' => ['table' => 'Avaliations',
                        'type' => 'INNER',
                        'foreignKey' => 'user_id',
                        'conditions' => ['avaliations.idavaliation = activities.avaliation_id']],
                    'conditions' => ['activities.idactivity' => $id, 'avaliations.situation' => 0]])->first();
        if (count($activity) > 0) {
            if ($this->Activities->delete($activity)) {
                $avaliation->delete($activity->avaliation_id);
                $this->Flash->success('A atividade foi deletada com sucesso.');
            } else {
                $this->Flash->success('A atividade não pode ser deletada!');
            }
        } else {
            $this->Flash->success('Você não tem permissão para deletadar esta atividade!');
        }
        return $this->redirect(['action' => 'alunoList']);
    }

}
