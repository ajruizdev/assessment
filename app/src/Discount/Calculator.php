<?php


namespace App\Discount;


use App\Entity\Product;

class Calculator
{
    private DiscountRule $discountRule;

    public function __construct(HigherDiscountRule $discountRule)
    {
        $this->discountRule = $discountRule;
    }

    public function getApplicableDiscountPercentage(Product $product): null|int
    {
        $discountList = [];
        if ($product?->getPromotion()) {
            $discountList[] = $product->getPromotion()->getDiscount();
        }
        if ($product?->getCategory()?->getPromotion()) {
            $discountList[] = $product->getCategory()->getPromotion()->getDiscount();
        }
        return $this->discountRule->getDiscount($discountList);
    }

    public function getPriceWithDiscount(Product $product): int
    {
        $discountPercentage = $this->getApplicableDiscountPercentage($product) ?? 0;
        return $product->getPrice() - ($product->getPrice() * $discountPercentage / 100);
    }
}