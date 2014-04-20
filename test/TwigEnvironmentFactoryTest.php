<?php

namespace Spiffy\Twig\View;

use Spiffy\View\Twig\TestAsset\TestTwigExtension;
use Spiffy\View\Twig\TwigEnvironmentFactory;

/**
 * @coversDefaultClass \Spiffy\View\Twig\TwigEnvironmentFactory
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
