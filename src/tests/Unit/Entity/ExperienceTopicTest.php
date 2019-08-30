<?php

namespace App\Tests\Unit\Entity;

use App\Entity\ExperienceTopic;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * @coversDefaultClass \App\Entity\ExperienceTopic
 * @covers \App\Entity\ExperienceTopic
 */
class ExperienceTopicTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = ExperienceTopic::class;
}
