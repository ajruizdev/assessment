<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $product1 = new Product('000001', 'BV Lean leather ankle boots', $this->getReference(CategoryFixture::BOOTS_CATEGORY_REFERENCE), 89000);
        $manager->persist($product1);

        $product2 = new Product('000002', 'BV Lean leather ankle boots', $this->getReference(CategoryFixture::BOOTS_CATEGORY_REFERENCE), 99000);
        $manager->persist($product2);

        $product3 = new Product('000003', 'Ashlington leather ankle boots', $this->getReference(CategoryFixture::BOOTS_CATEGORY_REFERENCE), 71000);
        $product3->setPromotion($this->getReference(PromotionFixture::DISCOUNT_15_REFERENCE));
        $manager->persist($product3);

        $product4 = new Product('000004', 'Naima embellished suede sandals', $this->getReference(CategoryFixture::SANDALS_CATEGORY_REFERENCE), 79500);
        $manager->persist($product4);

        $product5 = new Product('000005', 'Nathane leather sneakers', $this->getReference(CategoryFixture::SNEAKERS_CATEGORY_REFERENCE), 59000);
        $manager->persist($product5);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PromotionFixture::class,
            CategoryFixture::class
        ];
    }
}
