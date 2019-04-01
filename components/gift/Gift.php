<?php

/**
 * Класс подарка
 */
namespace app\components\gift;

class Gift
{
	public $type;
	
	public $name;
	
	public $count;
	
	public $units;
	
	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}
	
	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * @return mixed
	 */
	public function getCount()
	{
		return $this->count;
	}
	
	/**
	 * @return mixed
	 */
	public function getUnits() {
		return $this->units;
	}
	
	/**
	 * @param mixed $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}
	
	/**
	 * @param mixed $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}
	
	/**
	 * @param mixed $count
	 */
	public function setCount($count)
	{
		$this->count = $count;
	}
	
	/**
	 * @param mixed $units
	 */
	public function setUnits($units) {
		$this->units = $units;
	}
}