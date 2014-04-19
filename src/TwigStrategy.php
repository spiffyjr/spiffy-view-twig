<?php

namespace Spiffy\View;

use Spiffy\View\Renderer;
use Spiffy\View\Resolver;
use Spiffy\View\Strategy;

class TwigStrategy implements Strategy
{
    /**
     * @var Renderer
     */
    protected $renderer;

    /**
     * @var Resolver
     */
    protected $resolver;

    /**
     * @param Renderer $renderer
     * @param Resolver $resolver
     */
    public function __construct(Renderer $renderer, Resolver $resolver)
    {
        $this->renderer = $renderer;
        $this->resolver = $resolver;
    }

    /**
     * {@inheritDoc}
     */
    public function render($nameOrModel, array $variables = [])
    {
        return $this->renderer->render($nameOrModel, $variables);
    }

    /**
     * {@inheritDoc}
     */
    public function canRender($nameOrModel)
    {
        try {
            $this->resolver->resolve($nameOrModel);
        } catch (\Twig_Error_Loader $e) {
            return false;
        }
        return true;
    }
}
