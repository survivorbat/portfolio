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
        $this->loginAs('4R0xx5L7aAca61M', 'admin');

        $this->client->request(Request::METHOD_GET, 'UqUMbUkG/app/project/list');
        $response = $this->client->getResponse();

        $this->assertTrue($response->isSuccessful());
    }

    /**
     * TODO: Add images and technologies
     *
     * @return void
     */
    public function testIfAddingProjectWorks(): void
    {
        $this->loginAs('4R0xx5L7aAca61M', 'admin');

        $crawler = $this->client->request(
            Request::METHOD_GET,
            'UqUMbUkG/app/project/create'
        );

        $formElement = $crawler->filter("[action*='app/project/create?']");
        $formAction = $formElement->attr('action');

        $uniqId = substr(
            $formAction,
            strrpos($formAction, '?uniqid=') + 8
        );

        $form = $formElement->form([
            "{$uniqId}[name]" => 'Test project',
            "{$uniqId}[description]" => 'Test description',
            "{$uniqId}[link]" => 'https://developers.nl',
        ]);

        $this->client->submit($form);

        // Now have a look at the edit page to see if it was correctly added
        $editCrawler = $this->client->getCrawler();

        $editForm = $editCrawler
            ->filter("[action*='/edit?uniqid={$uniqId}']")
            ->form();

        $values = $editForm->getValues();
        $this->assertEquals('Test project', $values["{$uniqId}[name]"]);
        $this->assertEquals('Test description', $values["{$uniqId}[description]"]);
    }
}
