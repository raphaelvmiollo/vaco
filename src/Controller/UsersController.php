<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    //MÉTODOS GERAIS
    /**
     * Login method
     */
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->redirect(array('controller' => 'Pages', 'action' => 'index'));
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error("Login ou Senha estão incorretos.");
        }
    }

    /**
     * Logout method 
     * @return type
     */
    public function logout() {
        $this->Flash->success('Você acabou de sair da sessão.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Change Password Method
     * @param type $id
     */
    public function changePass($id = null) {
        $id = $this->Auth->user('iduser');
        $this->set('nome', $this->Auth->user('name'));
        $user = $this->Users->get($id, [ 'contain' => []]);
        $verify = 1;

        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($verify) {                                  //Falta verificar a senha antiga
                if ($this->request->data['newPassword1'] === $this->request->data['newPassword2']) {
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if ($this->Users->save($user)) {
                        $this->Flash->success('Senha alterada com sucesso!');
                    } else {
                        $this->Flash->error('A senha não pode ser salva. Por favor tente mais tarde.');
                    }
                } else {
                    $this->Flash->error('As novas senhas não são iguais');
                }
            } else {
                $this->Flash->error('A sua senha atual está incorreta. Por favor tente novamente.');
            }
        }
        $courses = $this->Users->Courses->find('list', ['limit' => 200]);
        $this->set(compact('user', 'courses'));
        $this->set('_serialize', ['user']);
    }

    //MÉTODOS DO ADMINISTRADOR

    /**
     * 
     */
    public function adminList() {
        $this->set('nome', $this->Auth->user('name'));
        $user = $this->Auth->identify();
        $this->paginate = [
            'contain' => ['Courses']
        ];
        $this->set('users', $this->paginate($this->Users->find('all', ['conditions' => ['OR' => [['Users.type' => 3], ['Users.type' => 4]]]])));
        $this->set('_serialize', ['users']);
    }

    /**
     * 
     * @return type
     */
    public function adminAdd() {
        $CourseList = new CoursesController();
        $this->set('nome', $this->Auth->user('name'));
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('O usuário foi salvo.');
                return $this->redirect(['action' => 'adminList']);
            } else {
                $this->Flash->error('O usuário não foi salvo! Por favor tente novamente.');
            }
        }
        $courses = $CourseList->getCourses();
        $this->set(compact('user', 'courses'));
        $this->set('_serialize', ['user']);
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function adminEdit($id = null) {
        $CourseList = new CoursesController();
        $this->set('nome', $this->Auth->user('name'));
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('O Usuário foi salvo.');
                return $this->redirect(['action' => 'adminList']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $courses = $CourseList->getCourses();
        $this->set(compact('user', 'courses'));
        $this->set('_serialize', ['user']);
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function adminDelete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('O usuário foi deletado .');
        } else {
            $this->Flash->error('O usuário não pode ser deletado. Por favor, tente novamente..');
        }
        return $this->redirect(['action' => 'adminList']);
    }

    //MÉTODOS DA COORDENAÇÃO

    /**
     * 
     */
    public function coordList() {
        $this->set('nome', $this->Auth->user('name'));
        $user = $this->Auth->identify();
        $this->paginate = [
            'contain' => ['Courses']
        ];
        $this->set('users', $this->paginate($this->Users->find('all', ['conditions' => ['Users.course_id' => $this->Auth->user('course_id'),
                                'OR' => [['Users.type' => 1], ['Users.type' => 2]]]])));
        $this->set('_serialize', ['users']);
    }

    /**
     * 
     * @return type
     */
    public function coordAdd() {
        $this->set('nome', $this->Auth->user('name'));
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('O usuário foi adicionado com sucesso.');
                return $this->redirect(['action' => 'coordList']);
            } else {
                $this->Flash->error('O usuário não foi salvo! Por favor tente novamente.');
            }
        }
        $this->set(compact('user', 'courses'));
        $this->set('_serialize', ['user']);
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function coordEdit($id = null) {
        $this->set('nome', $this->Auth->user('name'));
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('O Usuário foi salvo.');
                return $this->redirect(['action' => 'coordList']);
            } else {
                $this->Flash->error('O usuário não pode ser salvo. Por favor, tente novamente mais tarde.');
            }
        }
        $this->set(compact('user', 'courses'));
        $this->set('_serialize', ['user']);
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function coordDelete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('O usuário foi deletado .');
        } else {
            $this->Flash->error('O usuário não pode ser deletado. Por favor, tente novamente..');
        }
        return $this->redirect(['action' => 'coordList']);
    }

    /**
     * 
     * @return type
     */
    public function getUsers() {
        $classifications = array();
        $users = TableRegistry::get('Users');
        $query = $users->find('all');
        foreach ($query as $row) {
            $list[$row->iduser] = $row->name;
        }
        return $list;
    }

}
