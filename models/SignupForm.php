<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
	
	public $username;
	public $email;
	public $password;
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['username', 'trim'],
			['username', 'required', 'message' => '{attribute} должно быть заполнено'],
			['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Пользователь с таким именем уже зарегистрирован'],
			['username', 'string', 'min' => 2, 'max' => 255],
			['password', 'required', 'message' => '{attribute} должен быть заполнено']
		];
	}
	
	public function attributeLabels()
	{
		return [
			'username' => 'Имя',
			'password' => 'Пароль',
		];
	}
	
	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function signup()
	{
		
		if (!$this->validate()) {
			return null;
		}
		
		$user = new User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->setPassword($this->password);
		$user->generateAuthKey();
		return $user->save() ? $user : null;
	}
	
}