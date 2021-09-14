<?php


namespace App\Response\Model;


use Symfony\Component\Serializer\Annotation\Ignore;

class Product implements Response
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
     * @return Product
     */
    public function setSku(string $sku): Product
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
     * @return Product
     */
    public function setName(string $name): Product
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
     * @return Product
     */
    public function setCategory(string $category): Product
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
     * @return Product
     */
    public function setPrice(ProductPrice $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    #[Ignore] public function getType(): string
    {
        return 'product';
    }
}