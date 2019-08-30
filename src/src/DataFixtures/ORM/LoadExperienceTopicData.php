<?php

namespace App\DataFixtures\ORM;

use App\Entity\ExperienceTopic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class LoadExperienceTopicData extends Fixture implements OrderedFixtureInterface
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
            $experienceTopic = (new ExperienceTopic())
                ->setExplanation($this->faker->realText(400))
                ->setSince($this->faker->dateTimeBetween('-5 years', 'now'))
                ->setTechnology(
                    $this->getReference('technology_' . random_int(0, LoadTechnologyData::AMOUNT))
                );

            $this->setReference("experienceTopic_$i", $experienceTopic);

            $manager->persist($experienceTopic);
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
