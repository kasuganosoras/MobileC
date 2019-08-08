<?php
/********************************************\
|   __  __       _     _ _       ____        |
|  |  \/  | ___ | |__ (_) | ___ / ___|       |
|  | |\/| |/ _ \| '_ \| | |/ _ \ |           |
|  | |  | | (_) | |_) | | |  __/ |___        |
|  |_|  |_|\___/|_.__/|_|_|\___|\____|       |
|                                            |
|  国内手机号验证 - GPL v3 协议开源          |
|                                            |
|  https://github.com/kasuganosoras/MobileC  |
|                                            |
\********************************************/
class MobileC {
	
	public $TYPE_NONE = 0; // 无效号码
	public $TYPE_CTCC = 1; // 电信运营商
	public $TYPE_CMCC = 2; // 移动运营商
	public $TYPE_CUCC = 3; // 联通运营商
	
	private $ChinaTelecomList = Array('133','149','153','173','177','180','181','189','199');
	private $ChinaMobileList  = Array('134','135','136','137','138','139','147','150','151','152','157','158','159','172','178','182','183','184','187','188','198');
	private $ChinaUnicomList  = Array('130','131','132','145','155','156','166','171','175','176','185','186','166');
	
	/**
	 *
	 *	正则表达式匹配手机号
	 *
	 */
	private function regCheck($number)
	{
		return preg_match("/^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/", $number) ? true : false;
	}
	
	/**
	 *
	 *	判断是否是有效手机号
	 *
	 */
	public function isValid($number)
	{
		return $this->regCheck($number);
	}
	
	/**
	 *
	 *	判断是否是电信手机号
	 *
	 */
	public function isChinaTelecom($number)
	{
		return in_array(substr($number, 0, 3), $this->ChinaTelecomList);
	}
	
	/**
	 *
	 *	判断是否是移动手机号
	 *
	 */
	public function isChinaMobile($number)
	{
		return in_array(substr($number, 0, 3), $this->ChinaMobileList);
	}
	
	/**
	 *
	 *	判断是否是联通手机号
	 *
	 */
	public function isChinaUnicom($number)
	{
		return in_array(substr($number, 0, 3), $this->ChinaUnicomList);
	}
	
	/**
	 *
	 *	获取手机号对应的运营商
	 *
	 */
	public function getProvider($number)
	{
		if($this->isValid($number)) {
			if($this->isChinaTelecom($number)) return $this->TYPE_CTCC;
			if($this->isChinaMobile($number))  return $this->TYPE_CMCC;
			if($this->isChinaUnicom($number))  return $this->TYPE_CUCC;
		}
		return $this->TYPE_NONE;
	}
}
