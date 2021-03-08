<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

class AuthController extends AppController
{

	// 初期化処理
	public function initialize()
	{
		parent::initialize();
		// 必要なコンポーネントのロード
		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		$this->loadComponent('Auth', [
			'authorize' => ['Controller'],
			'authenticate' => [
				'Form' => [
					'fields' => [
						'username' => 'name',
						'password' => 'password'
					]
				]
			],
			'loginRedirect' => [
				'controller' => 'Projects',
				'action' => 'index'
			],
			'logoutRedirect' => [
				'controller' => 'Auth',
				'action' => 'login',
			],
			'authError' => 'ログインしてください。',
		]);

		// ログインユーザー情報
		$this->set('authuser', $this->Auth->user());
	}

	// ログイン処理
	function login(){
		// POST時の処理
		if($this->request->isPost()) {
			$user = $this->Auth->identify();
			// Authのidentifyをユーザーに設定
			if(!empty($user)){
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('ユーザー名かパスワードが間違っています。');
		}
	}
	
	// ログアウト処理
	public function logout() {
		// セッションを破棄
		$this->request->session()->destroy();
		return $this->redirect($this->Auth->logout());
	}

	// 認証をしないページの設定
	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow(['login']);
	}
	
	// 認証時のロールの処理
	public function isAuthorized($user = null){
		// 管理者はtrue
		// if($user['role_id'] === 1){
		//    return true;
		// }
		// 一般ユーザーはAuctionControllerのみtrue、他はfalse
		// if($user['role'] === 'user'){
		// 	if ($this->name == 'Auction'){
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }
		// その他はすべてfalse
		// $this->Flash->error('ログイン権限がありません。');
		// return false;

		//どんな権限でもログイン可能
		return true;
	}
}