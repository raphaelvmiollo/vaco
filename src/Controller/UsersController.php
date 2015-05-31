<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {
   
    //MÉTODOS GERAIS
    
    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Courses']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

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
            $this->Flash->error('Seu login ou senha estão incorretos.');
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

    public function alterPass($id = null) {
        $id = $this->Auth->user('iduser');
        $this->set('nome', $this->Auth->user('name'));
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->request->data['oldpassword'] == '123') {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success('Senha alterada com sucesso!');
                } else {
                    $this->Flash->error('A senha não pode ser salva. Por favor tente mais tarde.');
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
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }
    /**
     * 
     * @return type
     */
    public function adminAdd() {
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
        $courses = $this->Users->Courses->find('list', ['limit' => 200]);
        $this->set(compact('user', 'courses'));
        $this->set('_serialize', ['user']);
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    public function adminEdit($id = null) {
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
        $courses = $this->Users->Courses->find('list', ['limit' => 200]);
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
        $this->set('users', $this->paginate($this->Users));
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
                $this->Flash->success('O usuário foi salvo.');
                return $this->redirect(['action' => 'coordList']);
            } else {
                $this->Flash->error('O usuário não foi salvo! Por favor tente novamente.');
            }
        }
        $courses = $this->Users->Courses->find('list', ['limit' => 200]);
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
                return $this->redirect(['action' => 'adminList']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $courses = $this->Users->Courses->find('list', ['limit' => 200]);
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
    
}
