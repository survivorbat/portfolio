<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Technology;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * @coversDefaultClass \App\Entity\Technology
 * @covers \App\Entity\Technology
 */
class TechnologyTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = Technology::class;
    /** @var array $excludedGetters */
    protected $excludedGetters = ['getStatusUpdates', 'getProjects', 'getExperienceTopics'];
}
