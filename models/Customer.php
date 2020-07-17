<?php
header('Content-type: text/html;charset=utf-8');
require_once("../models/CurrencyConverter.php");

class Customer
{
    private $id;
    private $currencyConverter;
    
    public function __construct($id, CurrencyConverter $currencyConverter) {
        $this->id = $id;
        $this->currencyConverter = $currencyConverter;
    }


    public function getTransactions()
    {
        $i = 1;
        $result = array();
		$filename = '../models/data.csv';
		
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) {


                if($i>1) {
                    $line = explode(";",$data[0]);
                    
                    if($line[0] == $this->id) {
                        $new_value = $this->currencyConverter->convert($line[2]);
                        $row = " Transazione del giorno $line[1] importo: $line[2] importo in euro: €$new_value <br>" ;
                        array_push($result, $row);
                    }
                }
                $i++;
            }
            fclose($handle);
        }
        return $result;
    }

}
