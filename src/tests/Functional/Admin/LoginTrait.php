<?php

namespace App\Tests\Functional\Admin;

use Symfony\Bundle\FrameworkBundle\Client;

trait LoginTrait
{
    /** @var Client $client */
    protected $client;

    /**
     * @param string $username
     * @param string $password
     */
    public function loginAs(string $username, string $password): void
    {
        $this->client->setServerParameter('PHP_AUTH_USER', $username);
        $this->client->setServerParameter('PHP_AUTH_PW', $password);
    }
}
