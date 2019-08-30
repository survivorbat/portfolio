<?php

namespace App\DataFixtures\ORM;

use App\Entity\StatusUpdate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

/**
 * @codeCoverageIgnore
 */
class LoadStatusUpdateData extends Fixture implements OrderedFixtureInterface
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
            $statusUpdate = (new StatusUpdate())
                ->setContent($this->faker->realText(400))
                ->setTitle($this->faker->realText(30))
                ->setTechnologies([
                    $this->getReference('technology_' . random_int(0, LoadTechnologyData::AMOUNT))
                ])
                ->setImage(
                    $this->getReference('image_' . random_int(0, LoadImageData::AMOUNT))
                );

            $this->setReference("statusUpdate_$i", $statusUpdate);

            $manager->persist($statusUpdate);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder(): int
    {
        return 3;
    }
}
