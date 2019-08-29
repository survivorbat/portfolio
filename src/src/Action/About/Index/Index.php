<?php

namespace App\Action\About\Index;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class Index
{
    /** @var EngineInterface $engine */
    protected $engine;

    /**
     * Index constructor.
     * @param EngineInterface $engine
     */
    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        return new Response(
            $this->engine->render('@About/index/index.html.twig')
        );
    }
}
