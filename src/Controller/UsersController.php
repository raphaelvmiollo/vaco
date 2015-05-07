<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

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
	 * View method
	 *
	 * @param string|null $id User id.
	 * @return void
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function view($id = null) {
		$user = $this->Users->get($id, [
			'contain' => ['Courses']
			]);
		$this->set('user', $user);
		$this->set('_serialize', ['user']);
	}

	/**
	 * Add method
	 *
	 * @return void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$courses = $this->Users->Courses->find('list', ['limit' => 200]);
		$this->set(compact('user', 'courses'));
		$this->set('_serialize', ['user']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id User id.
	 * @return void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$user = $this->Users->get($id, [
			'contain' => []
			]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$courses = $this->Users->Courses->find('list', ['limit' => 200]);
		$this->set(compact('user', 'courses'));
		$this->set('_serialize', ['user']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id User id.
	 * @return void Redirects to index.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success('The user has been deleted.');
		} else {
			$this->Flash->error('The user could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * Login method
	 */
	public function login() {
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);    
				if($this->Auth->user('type') == 1){
					$this->redirect(array('controller' => 'users', 'action' => 'aluno'));
				}
				if($this->Auth->user('type') == 2){
					$this->redirect(array('controller' => 'users', 'action' => 'colegiado'));
				}
				if($this->Auth->user('type') == 3){
					$this->redirect(array('controller' => 'users', 'action' => 'coordenacao'));
				}
				if($this->Auth->user('type') == 4){
					$this->redirect(array('controller' => 'users', 'action' => 'administrador'));
				}
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Your login or password is incorrect.');
		}
	}

	/**
	 * Logout method 
	 * @return type
	 */
	public function logout() {
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}

	public function aluno(){}

	public function administrador(){}

	public function coordenacao(){}

	public function colegiado(){}

}
