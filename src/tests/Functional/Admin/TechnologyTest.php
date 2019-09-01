<?php

namespace App\Tests\Functional\Admin;

use App\Tests\Functional\Testcase\FixtureAwareTestCase;
use Symfony\Component\HttpFoundation\Request;

class TechnologyTest extends FixtureAwareTestCase
{
    use LoginTrait;

    /**
     * @return void
     */
    public function testIfProjectIndexWorks(): void
    {
        $this->loginAs('maartendev', 'admin');

        $this->client->request(Request::METHOD_GET, 'UqUMbUkG/app/technology/list');
        $response = $this->client->getResponse();

        $this->assertTrue($response->isSuccessful());
    }

    /**
     * @return void
     */
    public function testIfAddingProjectWorks(): void
    {
        $this->loginAs('maartendev', 'admin');

        $crawler = $this->client->request(
            Request::METHOD_GET,
            'UqUMbUkG/app/technology/create'
        );

        $formElement = $crawler->filter("[action*='app/technology/create?']");
        $formAction = $formElement->attr('action');

        $uniqId = substr(
            $formAction,
            strrpos($formAction, '?uniqid=') + 8
        );

        $form = $formElement->form([
            "{$uniqId}[name]" => 'Test technology',
        ]);

        $this->client->submit($form);

        // Now have a look at the edit page to see if it was correctly added
        $editCrawler = $this->client->getCrawler();

        $editForm = $editCrawler
            ->filter("[action*='/edit?uniqid={$uniqId}']")
            ->form();

        $values = $editForm->getValues();
        $this->assertEquals('Test technology', $values["{$uniqId}[name]"]);
    }
}
