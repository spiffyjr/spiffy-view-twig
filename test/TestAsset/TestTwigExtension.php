<?php

namespace Spiffy\View\Twig\TestAsset;

class TestTwigExtension extends \Twig_Extension
{
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'test';
    }
}
