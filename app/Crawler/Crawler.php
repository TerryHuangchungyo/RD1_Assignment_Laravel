<?php
namespace App\Crawler;

abstract class Crawler {
    abstract public function getData();
    abstract public function transformData( $data );
}