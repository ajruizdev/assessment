<?php


namespace App\ResponseModel;


class ProductResponse
{
    private string $sku;
    private string $name;
    private string $category;
    private ProductPrice $price;

    /**
     * ProductResponse constructor.
     * @param $sku
     * @param $name
     * @param $category
     * @param $price
     */
    public function __construct($sku, $name, $category, $price) {
        $this->sku = $sku;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return ProductResponse
     */
    public function setSku(string $sku): ProductResponse
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProductResponse
     */
    public function setName(string $name): ProductResponse
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return ProductResponse
     */
    public function setCategory(string $category): ProductResponse
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return ProductPrice
     */
    public function getPrice(): ProductPrice
    {
        return $this->price;
    }

    /**
     * @param ProductPrice $price
     * @return ProductResponse
     */
    public function setPrice(ProductPrice $price): ProductResponse
    {
        $this->price = $price;
        return $this;
    }


}