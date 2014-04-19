<?php

namespace Spiffy\View;

use Spiffy\View\TestAsset\TestTwigExtension;

/**
 * @coversDefaultClass \Spiffy\View\TwigEnvironmentFactory
 */
class TwigEnvironmentFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::createService
     */
    public function testCreateService()
    {
        $factory = new TwigEnvironmentFactory();
        $twig = $factory->createService([
            'loader_paths' => '.',
            'options' => [],
            'extensions' => [new TestTwigExtension()]
        ]);

        $this->assertInstanceOf('Twig_Environment', $twig);
    }
}
