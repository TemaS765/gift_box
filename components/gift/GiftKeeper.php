<?php

namespace app\components\gift;

use app\models\MovementGift;
use yii\helpers\VarDumper;

class GiftKeeper
{
	/**
	 * @var array Подарки
	 */
	private $gifts;
	
	/**
	 * giftKeeper constructor.
	 * @var array [] Массив подарков
	 */
	public function __construct($arrayGift)
	{
		$this->gifts = $arrayGift;
	}
	
	/**
	 * Получиь рандомный подарок
	 * @return bool|mixed
	 * @throws \Exception
	 */
	public function getRandomGift()
	{
		$col = count($this->gifts);
		
		if($col > 1) {
			$rand = random_int(0, $col - 1);
			$gift = $this->gifts[$rand]; /** @var Gift $gift */
			$gift->generateGift();
			return $gift;
		} elseif($col == 1) {
			$gift = $this->gifts[0]; /** @var Gift $gift */
			$gift->generateGift();
			return $gift;
		} else {
			return false;
		}
		
	}
	
	/**
	 * Установить подарок в очередь выдачи
	 * @param Gift $gift Подарок
	 */
	public function setGiftInStack($gift)
	{
		$movement = new MovementGift();
		VarDumper::dump($movement->addGift($gift),10,true);exit();
	}
	
}