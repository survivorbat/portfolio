<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * @coversDefaultClass \App\Entity\Project
 * @covers \App\Entity\Project
 */
class ProjectTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = Project::class;
    /** @var array $excludedGetters */
    protected $excludedGetters = ['getTechnologies', 'getImages'];
}
