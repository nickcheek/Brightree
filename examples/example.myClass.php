<?php

include 'vendor/autoload.php';

use Nickcheek\Brightree\Brightree;
use Carbon;

class myClass {

    protected object $bt;

    public function __construct()
    {
        $username = 'nick@nicholascheek';
        $password = 'myPa$$word';

        $this->bt = new Brightree($username,$password);
    }

    public function getSalesNum()
    {
        $date = Carbon::now();
        $today = $date->format('Y-m-d');
        $order = [
            'SearchParams' => [
                'Branch' => ['ID' => 102],
                'CreateDateTimeStart' => $today .'T00:00:00.000',
                'CreateDateTimeEnd' => $today .'T23:59:59.000',
            ],
            'SortParams' => [],
            'pageSize' => 10,
            'page' => 1,
        ];

        $number = $this->bt->SalesOrder()->SalesOrderSearch($order);
        return $number->SalesOrderSearchResult->TotalItemCount;
    }
}

$brightree = new myClass();
$response = $brightree->getSalesNum();
print_r($response);