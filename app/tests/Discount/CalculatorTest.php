<?php

namespace App\Tests\Discount;

use App\Discount\Calculator;
use App\Discount\HigherDiscountRule;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Promotion;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testGetPriceWithDiscount()
    {
        $product = new Product('sku', 'name', new Category('name', 'slug'), 10000);
        $product->getCategory()->setPromotion(new Promotion(50));
        $calculator = new Calculator(new HigherDiscountRule());
        $priceWithDiscount = $calculator->getPriceWithDiscount($product);

        $this->assertEquals(5000, $priceWithDiscount);
    }

    public function testGetApplicableDiscountPercentage()
    {
        $product = new Product('sku', 'name', new Category('name', 'slug'), 10000);
        $product->getCategory()->setPromotion(new Promotion(50));
        $calculator = new Calculator(new HigherDiscountRule());
        $discount = $calculator->getApplicableDiscountPercentage($product);

        $this->assertEquals(50, $discount);
    }
}
