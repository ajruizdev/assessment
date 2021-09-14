<?php


namespace App\Discount;


interface DiscountRule
{
    public function getDiscount(array $discountList): null|int;
}