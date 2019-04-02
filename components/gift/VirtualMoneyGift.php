<?php
/**
 * Класс подарка баллы лаяльности
 */

namespace app\components\gift;

class VirtualMoneyGift extends Gift
{
	/**
	 * @var integer Минимальное значения для рандомного выбора количества
	 */
	const MIN = 300;
	
	/**
	 * @var integer Максимальное значения для рандомного выбора количества
	 */
	const MAX = 10000;
	
	/**
	 * VirtualMoneyGift constructor.
	 */
	public function __construct()
	{
		$this->type = Gift::TYPE_LAYOUT_POINTS;
		$this->name = Gift::$giftNames[Gift::TYPE_LAYOUT_POINTS];
		$this->units = 'б.';
	}
	
	/**
	 * Генерация подарка
	 */
	public function generateGift()
	{
		$this->setCount(random_int(self::MIN,self::MAX));
	}
	
	/**
	 * Реализовать подарок
	 */
	public function realizeGift()
	{
	
	}
	
}