<?php

namespace Spiffy\View\Twig;

use Spiffy\View;

class TwigRenderer implements View\ViewRenderer
{
    /**
     * @var TwigResolver
     */
    protected $resolver;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @param \Twig_Environment $twig
     * @param TwigResolver $resolver
     */
    public function __construct(\Twig_Environment $twig, TwigResolver $resolver)
    {
        $this->twig = $twig;
        $this->resolver = $resolver;
    }

    /**
     * {@inheritDoc}
     */
    public function getEngine()
    {
        return $this->twig;
    }

    /**
     * {@inheritDoc}
     */
    public function render($nameOrModel, array $variables = [])
    {
        if (!$nameOrModel instanceof View\ViewModel) {
            $model = new View\ViewModel();
            $model->setVariables($variables);
            $model->setTemplate($nameOrModel);

            $nameOrModel = $model;
        }

        return $this
            ->resolver
            ->resolve($nameOrModel)
            ->render($nameOrModel->getVariables());
    }
}
