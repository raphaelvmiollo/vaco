<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Avaliations Controller
 *
 * @property \App\Model\Table\AvaliationsTable $Avaliations
 */
class AvaliationsController extends AppController {

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($idAvaliator, $situation) {
        $this->verifyAcess(1);
        $avaliation = $this->Avaliations->newEntity();
        if ($this->request->is('post')) {
            $avaliation = $this->Avaliations->patchEntity($avaliation, $this->request->data);
            $avaliation->situation = $situation;
            $avaliation->avaliator_id = $idAvaliator;
            if ($this->Avaliations->save($avaliation)) {
                return $avaliation->idavaliation;
            } else {
                $this->Flash->error('A Atividade não pode ser salva! Tente novamente mais tarde!');
                header("Location: /vaco/pages/index");
                die();
            }
        }
    }

    public function approve($id = null) {
        $this->verifyAcess(3);
        $users = new UsersController();
        $class = new ClassificationsController();
        $this->set('nome', $this->Auth->user('name'));
        $this->set('user', $users->getUsers());
        $this->set('class', $class->getDropClassifications());
        $this->paginate = ['contain' => ['Users', 'Activities']];
        $avaliation = $this->paginate($this->Avaliations->find("all", ['conditions' => ['avaliations.idavaliation' => $id, 'avaliations.situation' => 1]]))->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $avaliation = $this->Avaliations->get($id, ['contain' => []]);
            $avaliationActivity = $this->Avaliations->patchEntity($avaliation, $this->request->data);
            if ($this->Avaliations->save($avaliationActivity)) {
                $this->Flash->success('A Atividade foi avaliada com sucesso!');
            } else {
                $this->Flash->error('A Atividade não pode ser avaliada. Tente novamente mais tarde.');
            }
            header("Location: /vaco/activities/approveList");
            die();
        }

        $this->set('avaliation', $avaliation);
    }

    /**
     * Edit method
     *
     * @param string|null $id Avaliation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function avalia($id = null) {
        $this->verifyAcess([2, 3]);
        $users = new UsersController();
        $class = new ClassificationsController();
        $activity = new ActivitiesController();
        
        $this->set('nome', $this->Auth->user('name'));
        $this->set('user', $users->getUsers());
        $this->set('class', $class->getDropClassifications());
        
        $conditions = ['avaliations.idavaliation' => $id];
        $conditions[] = ($this->Auth->user('type') === 3) ?         
                                 ['Avaliations.situation' => -1] : ['avaliations.avaliator_id' => $this->Auth->user('iduser')];
        $this->paginate = ['contain' =>
                        ['Users', 'Activities']];
        $avaliation = $this->paginate($this->Avaliations
                        ->find("all", ['conditions' => $conditions]))->first();
        if (count($avaliation) > 0) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $activity->edit($id, $this->request->data['activity_hours']);
                $avaliation = $this->Avaliations->get($id, ['contain' => []]);
                $avaliationActivity = $this->Avaliations->patchEntity($avaliation, $this->request->data);             
                $avaliationActivity->date = date('Y-m-d');
                if ($this->Avaliations->save($avaliationActivity)) {
                    $this->Flash->success('A Atividade foi avaliada com sucesso!');
                } else {
                    $this->Flash->error('A Atividade não pode ser avaliada. Tente novamente mais tarde.');
                }
                header("Location: /vaco/activities/activityList");
                die();
            }
        } else {
            $this->Flash->success('Não há atividades para serem avaliadas!');
            header("Location: /vaco/activities/activityList");
            die();
        }

        $this->set('avaliation', $avaliation);
    }

    /**
     * Delete method
     *
     * @param string|null $id Avaliation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $avaliation = $this->Avaliations->get($id);
        $this->Avaliations->delete($avaliation);
    }

    public function generateAvaliation($idClass) {
        $classification = new ClassificationsController();
        $avaliatorType = $classification->getClassifications($idClass);

        if (($avaliatorType->avaliator_type) == 2) {
            $users = $this->Avaliations->users->find("all", ['conditions' =>
                ['users.type' => 2,
                    'users.course_id' => $this->Auth->user('course_id')]]);
            if (count($users->all()) === 0) {
                $this->Flash->error('A Atividade não pode ser salva! Tente novamente mais tarde!');
                header("Location: /vaco/pages/index");
                die();
            } else {
                $avaliations = $this->Avaliations->find("all", ['join' => [
                        'table' => 'activities',
                        'alias' => 'act',
                        'type' => 'INNER',
                        'foreignKey' => 'user_id',
                        'conditions' => ['act.avaliation_id = avaliations.idavaliation']],
                    'conditions' => ["act.submition_date  BETWEEN '" . date('Y-m-d', strtotime('-1 months')) . "' AND '" . date('Y-m-d') . "'"]]);
                foreach ($users as $user) {
                    $contador = 0;
                    foreach ($avaliations as $aval) {
                        if ($user->iduser === $aval->avaliator_id) {
                            $contador++;
                        }
                    }
                    $avaliatorCount[$user->iduser] = $contador;
                }
                $situation = 0;
                $idAvaliator = array_search(min($avaliatorCount), $avaliatorCount);
            }
        } else {
            $users = $this->Avaliations->users->find("all", ['conditions' =>
                        ['users.type' => 3,
                            'users.course_id' => $this->Auth->user('course_id')]])->first();
            $situation = -1;
            $idAvaliator = $users->iduser;
        }
        $avaliation = $this->add($idAvaliator, $situation);
        return $avaliation;
    }

}
