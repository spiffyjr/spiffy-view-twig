<?php

namespace Spiffy\View;

class TwigStrategyFactory
{
    /**
     * @param \Twig_Environment $twig
     * @return TwigStrategy
     */
    public function createService(\Twig_Environment $twig)
    {
        $resolver = new TwigResolver($twig);
        $renderer = new TwigRenderer($twig, $resolver);
        $strategy = new TwigStrategy($renderer, $resolver);

        return $strategy;
    }
}
