<?php

namespace App\Tests\Functional\Admin;

use App\Tests\Functional\Testcase\FixtureAwareTestCase;
use Symfony\Component\HttpFoundation\Request;

class SecurityTest extends FixtureAwareTestCase
{
    use LoginTrait;

    /**
     * @return void
     */
    public function testIfLoggingInIsPossible(): void
    {
        $this->loginAs('maartendev', 'admin');

        $this->client->request(Request::METHOD_GET, 'UqUMbUkG/dashboard');
        $response = $this->client->getResponse();

        $this->assertTrue($response->isSuccessful());
    }

    /**
     * @return void
     */
    public function testIfAdminPageIsProtected(): void
    {
        $this->client->request(Request::METHOD_GET, 'UqUMbUkG/dashboard');
        $response = $this->client->getResponse();

        $this->assertEquals(401, $response->getStatusCode());
    }
}
