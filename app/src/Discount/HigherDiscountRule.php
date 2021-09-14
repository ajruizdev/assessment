<?php


namespace App\Discount;


class HigherDiscountRule implements DiscountRule
{
    public function getDiscount(array $discountList): null|int
    {
        if (!$discountList) {
            return null;
        }
        return max($discountList);
    }
}