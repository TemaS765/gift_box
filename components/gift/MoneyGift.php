<?php
/**
 * Класс подарка Деньги
 */

namespace app\components\gift;

use Faker\Provider\Payment;
use app\models\Money;
use yii\helpers\VarDumper;

class MoneyGift extends Gift
{
	/**
	 * @var integer Минимальное значения для рандомного выбора количества
	 */
	const MIN = 10;
	
	/**
	 * @var integer Максимальное значения для рандомного выбора количества
	 */
	const MAX = 100;
	
	/**
	 * MoneyGift constructor.
	 */
	public function __construct()
	{
		$this->type = Gift::TYPE_MONEY;
		$this->name = Gift::$giftNames[Gift::TYPE_MONEY];
		$this->units = 'руб.';
	}
	
	/**
	 * Генерация подарка
	 */
	public function generateGift()
	{
		$money = new Money();
		$balance = $money->getBalance();
		
		if ($balance && $balance >= self::MIN) {
			do {
				$randomValue = random_int(self::MIN, self::MAX);
			} while ($randomValue > $balance);
		}
		
		$this->setCount($randomValue);
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