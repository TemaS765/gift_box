<?php

namespace app\models;

use app\components\gift\Gift;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;

class MovementGift extends ActiveRecord
{
	const STATE_CONFIRM = 'confirm';
	const STATE_CANCELLED = 'cancelled';
	const STATE_WAITING = 'waiting';
	
	public $dtime_create;
	public $type;
	public $name;
	public $count;
	public $uid;
	public $state;
	
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'movement_gift';
	}
	
	/**
	 * Добавить в очередь
	 * @param Gift $gift
	 */
	public function addGift($gift)
	{
		$user = Yii::$app->user;
		$date = (new \DateTime())->getTimestamp();
		
		$this->dtime_create = $date;
		$this->type = $gift->getType();
		$this->name = $gift->getName();
		$this->count = $gift->getCount();
		$this->uid = $user->id;
		$this->state = self::STATE_WAITING;
		
		//VarDumper::dump($this,10,true);exit();
		
		return $this->save();
	}
}
