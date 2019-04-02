<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Money extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			TimestampBehavior::className(),
		];
	}
	
	/**
	 * Получить текущий баланс
	 */
	public function getBalance()
	{
		$db = Yii::$app->db;
		$result = $db->createCommand('SELECT current_amount FROM ' . self::tableName() .' ORDER BY ID DESC LIMIT 1')->queryOne();
		if (isset($result['current_amount'])) {
			return (int) $result['current_amount'];
		}
		return false;
	}
}
