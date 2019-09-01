<?php

namespace App\Tests\Functional\Admin;

use App\Tests\Functional\Testcase\FixtureAwareTestCase;
use Symfony\Component\HttpFoundation\Request;

class ContactOptionAdminTest extends FixtureAwareTestCase
{
    use LoginTrait;

    /**
     * @return void
     */
    public function testIfContactOptionIndexWorks(): void
    {
        $this->loginAs('maartendev', 'admin');

        $this->client->request(Request::METHOD_GET, 'UqUMbUkG/app/contactoption/list');
        $response = $this->client->getResponse();

        $this->assertTrue($response->isSuccessful());
    }

    /**
     * @return void
     */
    public function testIfAddingContactOptionWorks(): void
    {
        $this->loginAs('maartendev', 'admin');

        $crawler = $this->client->request(
            Request::METHOD_GET,
            'UqUMbUkG/app/contactoption/create'
        );

        $formElement = $crawler->filter("[action*='app/contactoption/create?']");
        $formAction = $formElement->attr('action');

        $uniqId = substr(
            $formAction,
            strrpos($formAction, '?uniqid=') + 8
        );

        $form = $formElement->form([
            "{$uniqId}[label]" => 'email',
            "{$uniqId}[value]" => 'test@exmaple.com',
        ]);

        $this->client->submit($form);

        // Now have a look at the edit page to see if it was correctly added
        $editCrawler = $this->client->getCrawler();

        $editForm = $editCrawler
            ->filter("[action*='/edit?uniqid={$uniqId}']")
            ->form();

        $values = $editForm->getValues();
        $this->assertEquals('email', $values["{$uniqId}[label]"]);
        $this->assertEquals('test@exmaple.com', $values["{$uniqId}[value]"]);
    }
}
