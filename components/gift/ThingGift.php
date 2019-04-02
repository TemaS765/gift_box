<?php
/**
 * Класс подарка предмет
 */

namespace app\components\gift;

use app\models\Thing;

class ThingGift extends Gift
{
	/**
	 * MoneyGift constructor.
	 */
	public function __construct()
	{
		$this->type = Gift::TYPE_THING;
		$this->units = 'шт.';
	}
	
	/**
	 * Генерация подарка
	 */
	public function generateGift()
	{
		$things = Thing::find()->all();
		$col = count($things);
		
		if ($col > 1) {
			$max = $col - 1;
			$rand = random_int(0, $max);
			$thing = $things[$rand];
			$this->name = $thing['name'];
			$this->count = 1;
		}
	}
	
	/**
	 * Реализовать подарок
	 */
	public function realizeGift()
	{
	
	}
}