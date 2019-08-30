<?php

namespace App\DataFixtures\ORM;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

/**
 * @codeCoverageIgnore
 */
class LoadTechnologyData extends Fixture implements OrderedFixtureInterface
{
    public const AMOUNT = 20;

    /** @var Generator $faker */
    protected $faker;

    /**
     * LoadProjectData constructor.
     */
    public function __construct()
    {
        $this->faker = Factory::create('en');
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::AMOUNT + 1; $i++) {
            $technology = (new Technology())
                ->setName($this->faker->word)
                ->setImage(
                    $this->getReference("image_" . random_int(0, LoadImageData::AMOUNT))
                );

            $this->setReference("technology_$i", $technology);

            $manager->persist($technology);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder(): int
    {
        return 2;
    }
}
