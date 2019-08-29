<?php

namespace App\Tests\Functional\Action\About\Index;

use App\Tests\Functional\Testcase\FixtureAwareTestCase;
use Symfony\Component\HttpFoundation\Request;

class IndexTest extends FixtureAwareTestCase
{
    /**
     * @return void
     */
    public function testIfIndexLoads(): void
    {
        $crawler = $this->client->request(Request::METHOD_GET, 'http://about.localhost');
        $response = $this->client->getResponse();

        $this->assertTrue($response->isSuccessful());
        $this->assertContains('About page', $crawler->text());
    }
}
