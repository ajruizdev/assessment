<?php


namespace App\Response;


use App\Response\Model\Response;

interface ResponseFactory
{
    public function create($product, $data = null): Response;
}