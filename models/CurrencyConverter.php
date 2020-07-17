<?php
header('Content-type: text/html; charset=utf-8');
require_once("../models/CurrencyWebservice.php");



class CurrencyConverter
{
    
    private $webservice;
    
    public function __construct(CurrencyWebservice $currencyWebservice) {
        $this->webservice = $currencyWebservice;
    }
    
    public function convert($amount)
    {
        $amount = str_replace('"', "", $amount);
        $currency = substr($amount,0,1);
		$currency = ord($currency);
		
		if($currency == 194 || $currency == 226){
			$value = substr($amount,2);
	}	else{
			$value = substr($amount,1);
		}

        $rate =    $this->webservice->getExchangeRate($currency);
		
		return $rate*$value;
    }

}