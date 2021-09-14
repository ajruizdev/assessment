<?php

namespace App\Tests\Response;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Promotion;
use App\Response\Model\ProductPrice;
use App\Response\ProductResponseFactory;
use PHPUnit\Framework\TestCase;

class ProductResponseFactoryTest extends TestCase
{
    public function testCreate()
    {
        // Expected result
        $expectedProductResponse = new \App\Response\Model\Product('test_sku', 'test_product', 'test_category', new ProductPrice(10000, 5000, '50%'));

        // Create product response from product
        $product = new Product('test_sku', 'test_product', new Category('test_category', 'test_category'), 10000);
        $product->setPromotion(new Promotion(50));

        $productResponseFactory = new ProductResponseFactory();
        $data = ['priceWithDiscount' => 5000, 'discountPercentage' => 50];
        $productResponse = $productResponseFactory->create($product, $data);

        $this->assertEquals($expectedProductResponse, $productResponse);
    }
}
