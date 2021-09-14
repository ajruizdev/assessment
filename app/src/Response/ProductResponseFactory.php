<?php


namespace App\Response;


use App\Response\Model\Product;
use App\Response\Model\ProductPrice;
use App\Response\Model\Response;

class ProductResponseFactory implements ResponseFactory
{
    public function create($product, $data = null): Response
    {
        $priceWithDiscount = $data['priceWithDiscount'] ?? $product->getPrice();
        $discountPercentage = $data['discountPercentage'] ?? null;
        $priceModel = new ProductPrice($product->getPrice(), $priceWithDiscount, $discountPercentage ? $discountPercentage.'%' : $discountPercentage);

        return new Product($product->getSku(), $product->getName(), $product->getCategory()?->getSlug(), $priceModel);
    }
}