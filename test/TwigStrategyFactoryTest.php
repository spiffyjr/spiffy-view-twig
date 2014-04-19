<?php

namespace Spiffy\View;

use Spiffy\Inject\Injector;

/**
 * @coversDefaultClass \Spiffy\View\TwigStrategyFactory
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

        $this->assertInstanceOf('Spiffy\View\TwigStrategy', $result);
    }
}
