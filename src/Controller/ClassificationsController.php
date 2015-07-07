<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Classifications Controller
 *
 * @property \App\Model\Table\ClassificationsTable $Classifications
 */
class ClassificationsController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function coordList() {
        $this->verifyAcess(3);
        $this->set('nome', $this->Auth->user('name'));
        $this->set('classifications', $this->paginate($this->Classifications->find('all', ['conditions' => ['Classifications.course_id' => $this->Auth->user('course_id')]])));
        $this->set('_serialize', ['classifications']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function coordAdd() {
        $this->verifyAcess(3);
        $this->set('nome', $this->Auth->user('name'));
        $classification = $this->Classifications->newEntity();
        if ($this->request->is('post')) {
            $classification = $this->Classifications->patchEntity($classification, $this->request->data);
            if ($this->Classifications->save($classification)) {
                $this->Flash->success('A categoria foi adicionada com sucesso.');
                return $this->redirect(['action' => 'coordList']);
            } else {
                $this->Flash->error('A categoria não pode ser adicionada. Por favor, tente mais tarde.');
            }
        }
        $this->set(compact('classification'));
        $this->set('_serialize', ['classification']);
    }

    public function coordView($id = null) {
        $this->verifyAcess(3);
        $this->set('nome', $this->Auth->user('name'));

        $class = $this->Classifications->get($id);
        $this->set('classification', $class);
        $this->set('_serialize', ['classification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Classification id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function coordEdit($id = null) {
        $this->verifyAcess(3);
        $this->set('nome', $this->Auth->user('name'));
        $classification = $this->Classifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classification = $this->Classifications->patchEntity($classification, $this->request->data);
            if ($this->Classifications->save($classification)) {
                $this->Flash->success('A categoria foi editada com sucesso.');
                return $this->redirect(['action' => 'coordList']);
            } else {
                $this->Flash->error('A categoria não pode ser editada. Por favor, tente mais tarde.');
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
    public function coordDelete($id = null) {
        $this->verifyAcess(3);
        $this->request->allowMethod(['post', 'delete']);
        $classification = $this->Classifications->get($id);
        if ($this->Classifications->delete($classification)) {
            $this->Flash->success('A categoria foi deletada com sucesso.');
        } else {
            $this->Flash->error('A categoria não pode ser deletada. Por favor, tente mais tarde');
        }
        return $this->redirect(['action' => 'coordList']);
    }

    /**
     * 
     * @return type
     */
    public function getClassifications($id = null) {
        $class = TableRegistry::get('Classifications');
        if ($id === null) {
            $result = $class->find('all', 
                        ['conditions' => 
                        ['Classifications.course_id' => $this->Auth->user('course_id')]]);
        } else {
            $query = $class->find('all', 
                        ['conditions' => 
                        ['Classifications.idclassification' => $id]]);
            $result = $query->first();
        }
        return $result;
    }

    /**
     * 
     * @return type
     */
    public function getDropClassifications() {
        $classificationDropDown = array();
        $query = $this->getClassifications();
        foreach ($query as $row) {
            $classificationDropDown[$row->idclassification] = $row->classification_name;
        }
        return $classificationDropDown;
    }

}
