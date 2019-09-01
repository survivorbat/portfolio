<?php

namespace App\DataFixtures\ORM;

use App\Entity\ContactOption;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadContactOptionData extends Fixture implements OrderedFixtureInterface
{
    /** @var array */
    protected const CONTENT = [
        ['label' => 'email', 'value' => 'email@example.com'],
        ['label' => 'github', 'value' => '[GitHub](https://gihub.com)'],
        ['label' => 'BitBucket', 'value' => '[BitBucket](https://bitbucket.com)']
    ];

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach (self::CONTENT as $item) {
            $contactItem = (new ContactOption())
                ->setLabel($item['label'])
                ->setValue($item['value']);

            $manager->persist($contactItem);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder(): int
    {
        return 1;
    }
}
