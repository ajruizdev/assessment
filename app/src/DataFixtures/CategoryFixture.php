<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixture extends Fixture implements DependentFixtureInterface
{
    public const BOOTS_CATEGORY_REFERENCE = 'boots-category';
    public const SANDALS_CATEGORY_REFERENCE = 'sandals-category';
    public const SNEAKERS_CATEGORY_REFERENCE = 'sneakers-category';

    public function load(ObjectManager $manager)
    {
        $bootsCategory = new Category('Boots', 'boots');
        $bootsCategory->setPromotion($this->getReference(PromotionFixture::DISCOUNT_30_REFERENCE));
        $manager->persist($bootsCategory);

        $this->addReference(self::BOOTS_CATEGORY_REFERENCE, $bootsCategory);

        $sandalsCategory = new Category('Sandals', 'sandals');
        $manager->persist($sandalsCategory);

        $this->addReference(self::SANDALS_CATEGORY_REFERENCE, $sandalsCategory);

        $sneakersCategory = new Category('Sneakers', 'sneakers');
        $manager->persist($sneakersCategory);

        $this->addReference(self::SNEAKERS_CATEGORY_REFERENCE, $sneakersCategory);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PromotionFixture::class,
        ];
    }
}
