<?php

namespace Spiffy\View\Twig;

use Spiffy\View;
use Twig_Environment;

class TwigResolver implements View\ViewResolver
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * @var string
     */
    protected $suffix;

    /**
     * @param Twig_Environment $twig
     * @param string $suffix
     */
    public function __construct(Twig_Environment $twig, $suffix = '.twig')
    {
        $this->twig = $twig;
        $this->suffix = $suffix;
    }

    /**
     * {@inheritDoc}
     */
    public function resolve($nameOrModel)
    {
        if ($nameOrModel instanceof View\Model) {
            $nameOrModel = $nameOrModel->getTemplate();
        }
        return $this->twig->loadTemplate($nameOrModel . $this->suffix);
    }
}
