<?php

namespace App\Tests\Discount;

use App\Discount\HigherDiscountRule;
use PHPUnit\Framework\TestCase;

class HigherDiscountRuleTest extends TestCase
{
    public function testGetDiscount()
    {
        $discountList = [20, 50, 10];
        $discountRule = new HigherDiscountRule();
        $discount = $discountRule->getDiscount($discountList);

        $this->assertEquals(50, $discount);
    }

    public function testGetDiscountFromEmptyList()
    {
        $discountList = [];
        $discountRule = new HigherDiscountRule();
        $discount = $discountRule->getDiscount($discountList);

        $this->assertEquals(null, $discount);
    }

    public function testGetDiscountFromOneElementList()
    {
        $discountList = [50];
        $discountRule = new HigherDiscountRule();
        $discount = $discountRule->getDiscount($discountList);

        $this->assertEquals(50, $discount);
    }
}
