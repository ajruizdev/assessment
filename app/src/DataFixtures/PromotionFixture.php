<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PromotionFixture extends Fixture
{
    public const DISCOUNT_15_REFERENCE = 'discount-15';
    public const DISCOUNT_30_REFERENCE = 'discount-30';

    public function load(ObjectManager $manager)
    {
        $productPromotion = new Promotion(15, 'Product discount');
        $manager->persist($productPromotion);

        $this->addReference(self::DISCOUNT_15_REFERENCE, $productPromotion);

        $categoryPromotion = new Promotion(30, 'Category discount');
        $manager->persist($categoryPromotion);

        $this->addReference(self::DISCOUNT_30_REFERENCE, $categoryPromotion);

        $manager->flush();
    }
}
