<?php

namespace Spiffy\View;

/**
 * @coversDefaultClass \Spiffy\View\TwigRenderer
 */
class TwigRendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TwigRenderer
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
     * @covers ::getEngine, ::__construct
     */
    public function testGetEngine()
    {
        $this->assertSame($this->twig, $this->r->getEngine());
    }

    /**
     * @covers ::render
     */
    public function testRenderViewModel()
    {
        $model = new ViewModel();
        $model->setTemplate('simple');
        $this->assertSame("A simple twig template\n", $this->r->render($model));

        $model->setTemplate('simple_vars');
        $model->setVariables(['foo' =>'bar']);
        $this->assertSame("bar\n", $this->r->render($model));
    }

    /**
     * @covers ::render
     */
    public function testRenderFromName()
    {
        $this->assertSame("A simple twig template\n", $this->r->render('simple'));
        $this->assertSame("bar\n", $this->r->render('simple_vars', ['foo' => 'bar']));
    }

    protected function setUp()
    {
        $this->loader = $loader = new \Twig_Loader_Filesystem([__DIR__ . '/view']);
        $this->twig = $twig = new \Twig_Environment($loader);
        $this->r = new TwigRenderer($twig, new TwigResolver($twig));
    }
}
