<?php

namespace App\Tests\Unit\Entity;

use App\Entity\StatusUpdate;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * @coversDefaultClass \App\Entity\StatusUpdate
 * @covers \App\Entity\StatusUpdate
 */
class StatusUpdateTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = StatusUpdate::class;
    /** @var array $excludedGetters */
    protected $excludedGetters = ['getTechnologies'];
}
