<?php

namespace App\DataFixtures\ORM;

use App\Entity\Project;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{
    public const AMOUNT = 10;

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
        $images = $this->getAllImages();

        for ($i = 0; $i < self::AMOUNT; $i++) {
            $project = (new Project())
                ->setName($this->faker->realText(50))
                ->setDescription($this->faker->realText(400))
                ->setLink(
                    $this->faker->boolean(20) ? $this->faker->url : null
                )
                ->setImages($images);

            $this->setReference("project_$i", $project);

            $manager->persist($project);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    protected function getAllImages(): array
    {
        $images = [];
        for ($i = 0; $i < LoadImageData::AMOUNT; $i++) {
            $images[] = $this->getReference("image_$i");
        }
        return $images;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder(): int
    {
        return 2;
    }
}
