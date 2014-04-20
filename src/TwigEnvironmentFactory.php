<?php

namespace Spiffy\View\Twig;

class TwigEnvironmentFactory
{
    /**
     * @param array $options
     * @return \Twig_Environment
     */
    public function createService(array $options)
    {
        $loader = new \Twig_Loader_Filesystem($options['loader_paths']);
        $twig = new \Twig_Environment($loader, $options['options']);

        if (isset($options['extensions'])) {
            foreach ($options['extensions'] as $extension) {
                $twig->addExtension($extension);
            }
        }

        return $twig;
    }
}
