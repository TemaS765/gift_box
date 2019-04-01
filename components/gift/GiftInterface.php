<?php
/**
 * Класс Подарок
 */
namespace app\components\gift;

interface GiftInterface
{
	/**
	 * Получить единицу приза
	 */
	public function generateGift();
	
	/**
	 * Реализация подарка
	 */
	public function realizeGift();
}