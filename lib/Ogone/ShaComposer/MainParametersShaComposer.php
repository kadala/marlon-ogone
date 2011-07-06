<?php
namespace Ogone\ShaComposer;

/**
 * SHA string composition the "old way", using only the "main" parameters
 */
class MainParametersShaComposer extends AbstractShaComposer
{
	public function compose($requestParameters)
	{
		// use lowercase internally
		$requestParameters = array_change_key_case($requestParameters, CASE_LOWER);
		
		return strtoupper(sha1(implode('', array(
			$requestParameters['orderid'],
			$requestParameters['currency'],
			$requestParameters['amount'],
			$requestParameters['pm'],
			$requestParameters['acceptance'],
			$requestParameters['status'],
			$requestParameters['cardno'],
			$requestParameters['payid'],
			$requestParameters['ncerror'],
			$requestParameters['brand'],
			$this->passphrase
		))));
	}
}