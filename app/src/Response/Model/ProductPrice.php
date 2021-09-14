<?php

namespace App\Response\Model;

class ProductPrice
{
    private int $original;
    private int $final;
    private ?string $discountPercentage;
    private string $currency;

    /**
     * ProductPrice constructor.
     * @param int $original
     * @param int $final
     * @param string|null $discountPercentage
     */
    public function __construct(int $original, int $final, string $discountPercentage = null)
    {
        $this->original = $original;
        $this->final = $final;
        $this->discountPercentage = $discountPercentage;
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
    public function getDiscountPercentage(): ?string
    {
        return $this->discountPercentage;
    }

    /**
     * @param string $discountPercentage
     * @return ProductPrice
     */
    public function setDiscountPercentage(string $discountPercentage): ProductPrice
    {
        $this->discountPercentage = $discountPercentage;
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