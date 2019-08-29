<?php

namespace App\Tests\Functional\Admin;

use App\Tests\Functional\Testcase\FixtureAwareTestCase;
use Symfony\Component\HttpFoundation\Request;

class ProjectTest extends FixtureAwareTestCase
{
    use LoginTrait;

    /**
     * @return void
     */
    public function testIfProjectIndexWorks(): void
    {
        $this->loginAs('4R0xx5L7aAca61MXAvEXEcm70GXF6T4HuhOvtMvS29UV3Yb6NSgiCUgw8IhERObe4YngFlhDp7ESf', 'admin');

        $this->client->request(Request::METHOD_GET, 'UqUMbUkGTKIpayqUqrsZcJktQCfFFtMqLzhbXZjfOjqh/app/project/list');
        $response = $this->client->getResponse();

        $this->assertTrue($response->isSuccessful());
    }
}