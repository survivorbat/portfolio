<?php

namespace App\Tests\Functional\Action\Projects\Index;

use App\Tests\Functional\Testcase\FixtureAwareTestCase;
use Symfony\Component\HttpFoundation\Request;

class IndexTest extends FixtureAwareTestCase
{
    /**
     * @return void
     */
    public function testIfIndexLoads(): void
    {
        $crawler = $this->client->request(Request::METHOD_GET, 'http://projects.localhost');
        $response = $this->client->getResponse();

        $this->assertTrue($response->isSuccessful());
        $this->assertStringContainsString('Projects page', $crawler->text());
    }
}
