<?php

include 'vendor/autoload.php';

use Nickcheek\Brightree\Brightree;

class myClass {

    protected object $bt;

    public function __construct()
    {
        $username = 'nick@nicholascheek';
        $password = 'myPa$$word';
        $this->bt = new Brightree($username,$password);
    }

    public function getSalesNumber(): int
    {
        $today = date('Y-m-d');
        $orderSearch = [
            'SearchParams' => [
                'Branch' => ['ID' => 102],
                'CreateDateTimeStart' => $today .'T00:00:00.000',
                'CreateDateTimeEnd' => $today .'T23:59:59.000',
            ]];

        $orderSort = ['SortParams' => []];

        //use the included arrayHelper to help you build your query.
        $order = $this->bt->search($orderSearch)->sort($orderSort)->build();

        $number = $this->bt->SalesOrder()->SalesOrderSearch($order);
        return $number->SalesOrderSearchResult->TotalItemCount;
    }
}

$brightree = new myClass();
$response = $brightree->getSalesNumber();
print_r($response);