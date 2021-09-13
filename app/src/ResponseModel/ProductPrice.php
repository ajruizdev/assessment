<?php

namespace App\ResponseModel;

class ProductPrice
{
    private int $original;
    private int $final;
    private ?string $discount_percentage;
    private string $currency;

    /**
     * ProductPrice constructor.
     * @param int $original
     * @param int $final
     * @param string|null $discount_percentage
     */
    public function __construct(int $original, int $final, string $discount_percentage = null)
    {
        $this->original = $original;
        $this->final = $final;
        $this->discount_percentage = $discount_percentage;
        $this->currency = 'EUR';
    }

    /**
     * @return int
     */
    public function getOriginal(): int
    {
        return $this->original;
    }

    /**
     * @param int $original
     * @return ProductPrice
     */
    public function setOriginal(int $original): ProductPrice
    {
        $this->original = $original;
        return $this;
    }

    /**
     * @return int
     */
    public function getFinal(): int
    {
        return $this->final;
    }

    /**
     * @param int $final
     * @return ProductPrice
     */
    public function setFinal(int $final): ProductPrice
    {
        $this->final = $final;
        return $this;
    }

    /**
     * @return string
     */
    public function getDiscountPercentage(): string
    {
        return $this->discount_percentage;
    }

    /**
     * @param string $discount_percentage
     * @return ProductPrice
     */
    public function setDiscountPercentage(string $discount_percentage): ProductPrice
    {
        $this->discount_percentage = $discount_percentage;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
}