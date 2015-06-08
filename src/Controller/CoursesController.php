<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController {
    
    /**
     * 
     * @return type
     */
    public function adminAdd() {
        $this->set('nome', $this->Auth->user('name'));
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success('O curso foi adicionado com sucesso.');
                return $this->redirect(['action' => 'adminList']);
            } else {
                $this->Flash->error('O curso não pode ser salvo. Por favor, tente novamente mais tarde.');
            }
        }
        $this->set(compact('course'));
        $this->set('_serialize', ['course']);
    }
    
    /**
     * 
     */
    public function adminList() {
        $this->set('nome', $this->Auth->user('name'));
        $this->set('courses', $this->paginate($this->Courses));
        $this->set('_serialize', ['courses']);
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function adminEdit($id = null) {
        $this->set('nome', $this->Auth->user('name'));
        $course = $this->Courses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success('O curso foi editado.');
                return $this->redirect(['action' => 'adminList']);
            } else {
                $this->Flash->error('O curso não pode ser salvo. Por favor, tente novamente mais tarde.');
            }
        }
        $this->set(compact('course'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->set('nome', $this->Auth->user('name'));
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success('O curso foi deletado com sucesso.');
        } else {
            $this->Flash->error('O curso não pode ser deletado. Por favor, tente novamente mais tarde.');
        }
        return $this->redirect(['action' => 'adminList']);
    }
    
     /**
     * 
     * @return type
     */
    public function getCourses() {
        $classifications = array();
        $class = TableRegistry::get('Courses');
        $query = $class->find('all');
        foreach ($query as $row) {
            $classifications[$row->idcourse] = $row->course_name;
        }
        return $classifications;
    }
    
}
