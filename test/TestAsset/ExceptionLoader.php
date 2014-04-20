<?php

namespace Spiffy\View\Twig\TestAsset;

use Twig_Error_Loader;

class ExceptionLoader implements \Twig_LoaderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getSource($name)
    {
        throw new \Twig_Error_Loader('foobar');
    }

    /**
     * {@inheritDoc}
     */
    public function getCacheKey($name)
    {
        return $name;
    }

    /**
     * {@inheritDoc}
     */
    public function isFresh($name, $time)
    {
        return false;
    }
}
