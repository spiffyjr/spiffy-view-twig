<?php

namespace Spiffy\View\Twig;

use Spiffy\View\Twig\TestAsset\ExceptionLoader;
use Spiffy\View\ViewModel;

/**
 * @coversDefaultClass \Spiffy\View\Twig\TwigStrategy
 */
class TwigStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TwigRenderer
     */
    protected $r;

    /**
     * @var TwigStrategy
     */
    protected $s;

    /**
     * @covers ::render, ::__construct
     */
    public function testRenderProxiesToRenderer()
    {
        $this->assertSame($this->r->render('simple'), $this->s->render('simple'));
    }

    /**
     * @covers ::canRender
     */
    public function testRenderReturnsFalseForNonModelValues()
    {
        $this->assertFalse($this->s->canRender('a'));
    }

    /**
     * @covers ::canRender
     */
    public function testCanRender()
    {
        $s = $this->s;
        $model = new ViewModel();

        $this->assertFalse($s->canRender($model));

        $model->setTemplate('simple');
        $this->assertTrue($s->canRender($model));
    }

    /**
     * @covers ::canRender
     */
    public function testCanRenderReturnsFalseOnLoaderErrors()
    {
        $twig = new \Twig_Environment(new ExceptionLoader());
        $resolver = new TwigResolver($twig);

        $r = new TwigRenderer($twig, $resolver);
        $s = new TwigStrategy($r, $resolver);

        $this->assertFalse($s->canRender('aasdfadf'));
    }

    protected function setUp()
    {
        $twig = new \Twig_Environment(new \Twig_Loader_Filesystem(__DIR__ . '/view'));
        $resolver = new TwigResolver($twig);

        $this->r = $r = new TwigRenderer($twig, $resolver);
        $this->s = $s = new TwigStrategy($r, $resolver);
    }
}
