<?php
/**
 * Класс подарка Деньги
 */

namespace app\components\gift;

use Faker\Provider\Payment;

class MoneyGift implements GiftInterface
{
	/**
	 * @var int Тип подарка
	 */
	const TYPE_GIFT = 1;
	
	/**
	 * Минимальное значение
	 */
	const MIN = 1;
	
	/**
	 * Максимальное значение
	 */
	const MAX = 100;
	
	/**
	 * Еденицы ищмерения
	 */
	const UNITS = 'руб.';
	
	/**
	 * Название елемента подарка
	 */
	const NAME = 'Деньги';
	
	/**
	 * @var Gift Модель подарка
	 */
	public $model;
	
	/**
	 * MoneyGift constructor.
	 */
	public function __construct()
	{
		//инициализируем модель
		$model = new Gift();
		$model->setName(self::NAME);
		$model->setType(self::TYPE_GIFT);
		$model->setUnits(self::UNITS);
	}
	
	/**
	 * Получить еденицу подарка
	 *
	 * @return Gift
	 */
	public function generateGift()
	{
		//$money = new Money();
		//$balance = $money->getBalance();
		
		$balance = 85; //баланс для теста
		
		if ($balance && $balance >= self::MIN) {
			do {
				$randomValue = random_int(self::MIN, self::MAX);
			} while ($randomValue > $balance);
		}
		
		$this->model->setCount($randomValue);
		
		return $this->model;
	}
	
	/**
	 * Реализовать подарок
	 *
	 * return boolean
	 */
	public function realizeGift()
	{
		$user = Yii::app()->user;
		$paymentAccount = (new PaymentUser())->getPaymentById($user->id);
		$payment = (new Payment())->transfer($paymentAccount->score, $this->model->getCount()); //осуществляет перевод на счет клиента
		//обработка ошибки перевода
		if ($payment) {
			return true;
		} else {
			return false;
		}
	}
}