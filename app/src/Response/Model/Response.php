<?php


namespace App\Response\Model;


use Symfony\Component\Serializer\Annotation\Ignore;

interface Response
{
    #[Ignore]
    public function getType(): string;
}