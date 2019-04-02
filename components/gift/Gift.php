<?php

/**
 * Класс подарка
 */
namespace app\components\gift;

class Gift
{
	/**
	 * Тип Деньги
	 */
	const TYPE_MONEY = 1;
	
	/**
	 * Тип баллы лояльности
	 */
	const TYPE_LAYOUT_POINTS = 2;
	
	/**
	 * Тип вещь
	 */
	const TYPE_THING = 3;
	
	/**
	 * @var array Типы подарков
	 */
	public static $giftTypes = [
		self::TYPE_MONEY => 'money',
		self::TYPE_LAYOUT_POINTS => 'loyalty_points',
		self::TYPE_THING => 'thing'
	];
	
	/**
	 * @var array Наименования подарков
	 */
	public static $giftNames = [
		self::TYPE_MONEY => 'Деньги',
		self::TYPE_LAYOUT_POINTS => 'Баллы лояльности',
		self::TYPE_THING => 'Предмет'
	];
	
	/**
	 * @var string Тип
	 */
	protected $type;
	
	/**
	 * @var string Наименование
	 */
	protected $name;
	
	/**
	 * @var integer Единицы измерения
	 */
	protected $units;
	
	/**
	 * @var integer Количество
	 */
	protected $count;
	
	/**
	 * @return mixed
	 */
	public function getCount()
	{
		return $this->count;
	}
	
	/**
	 * @param mixed $count
	 */
	public function setCount($count)
	{
		$this->count = $count;
	}
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
	
	/**
	 * Генерация подарка
	 */
	public function generateGift()
	{
	
	}
	
	/**
	 * Реализация подарка
	 */
	public function realizeGift()
	{
	
	}
}