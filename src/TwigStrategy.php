<?php

namespace Spiffy\View\Twig;

use Spiffy\View;

class TwigStrategy implements View\ViewStrategy
{
    /**
     * @var \Spiffy\View\ViewRenderer
     */
    protected $renderer;

    /**
     * @var \Spiffy\View\ViewResolver
     */
    protected $resolver;

    /**
     * @param \Spiffy\View\Twig\TwigRenderer $renderer
     * @param \Spiffy\View\Twig\TwigResolver $resolver
     */
    public function __construct(TwigRenderer $renderer, TwigResolver $resolver)
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
        if (!$nameOrModel instanceof View\ViewModel) {
            return false;
        }

        try {
            $this->resolver->resolve($nameOrModel);
        } catch (\Twig_Error_Loader $e) {
            return false;
        }
        return true;
    }
}
