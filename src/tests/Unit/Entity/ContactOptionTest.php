<?php

namespace App\Tests\Unit\Entity;

use App\Entity\ContactOption;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * @coversDefaultClass \App\Entity\ContactOption
 * @covers \App\Entity\ContactOption
 */
class ContactOptionTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = ContactOption::class;
}
