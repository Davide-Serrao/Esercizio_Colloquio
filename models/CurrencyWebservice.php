<?php

/**
 * Dummy web service returning random exchange rates
 *
 */
 header('Content-type: text/html; charset=utf-8');
class CurrencyWebservice{


    private $currencies = array("194"=>1.10,"36"=>0.87,"226"=>1);


    public function getExchangeRate($currency)
    {
    if (array_key_exists($currency, $this->currencies)) {
		//echo $this->currencies[$currency];
        return $this->currencies[$currency];
    } else {
            return 1;
        }
    }

}