<?php

namespace Spiffy\View\Twig;
use Spiffy\View\ViewModel;

/**
 * @coversDefaultClass \Spiffy\View\TwigResolver
 */
class TwigResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TwigResolver
     */
    protected $r;

    /**
     * @var \Twig_Loader_String
     */
    protected $loader;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @covers ::resolve, ::__construct
     */
    public function testResolveFromModel()
    {
        $model = new ViewModel();
        $model->setTemplate('simple');
        $this->assertSame($this->twig->loadTemplate('simple.twig'), $this->r->resolve($model));
    }

    /**
     * @covers ::resolve, ::__construct
     */
    public function tetResolveFromString()
    {
        $this->assertSame($this->twig->loadTemplate('simple.twig'), $this->r->resolve('simple'));
    }

    protected function setUp()
    {
        $this->loader = $loader = new \Twig_Loader_Filesystem([__DIR__ . '/view']);
        $this->twig = $twig = new \Twig_Environment($loader);
        $this->r = new TwigResolver($twig);
    }
}
