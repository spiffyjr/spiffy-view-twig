<?php

namespace Spiffy\View\Twig;

use Spiffy\View\Twig\TestAsset\ExceptionLoader;

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
        $this->assertSame($this->r->render('test'), $this->s->render('test'));
    }

    /**
     * @covers ::canRender
     */
    public function testCanRenderAlwaysReturnsTrue()
    {
        $this->assertTrue($this->s->canRender('a'));
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
        $twig = new \Twig_Environment(new \Twig_Loader_String());
        $resolver = new TwigResolver($twig);

        $this->r = $r = new TwigRenderer($twig, $resolver);
        $this->s = $s = new TwigStrategy($r, $resolver);
    }
}
