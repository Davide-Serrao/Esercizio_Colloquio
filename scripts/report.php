<?php 
header('Content-type: text/html;charset=utf-8');

require_once("../models/Customer.php");

$id = 1;


if(!isset($id) || !is_numeric($id)) {
    echo "Argomento non valido. Esecuzione interrotta\n";
    echo "Si prega di inserire un intero\n";
    exit;
}




$customer = new Customer($id, new CurrencyConverter( new CurrencyWebservice() ));


foreach ($customer->getTransactions() as $transaction) {
    echo  PHP_EOL . $transaction ;

}