<?php

namespace Spiffy\View\Twig;

use Spiffy\Inject\Injector;

/**
 * @coversDefaultClass \Spiffy\View\Twig\TwigStrategyFactory
 */
class TwigStrategyFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::createService
     */
    public function testCreateService()
    {
        $factory = new TwigStrategyFactory();
        $result = $factory->createService(new \Twig_Environment());

        $this->assertInstanceOf('Spiffy\View\Twig\TwigStrategy', $result);
    }
}
