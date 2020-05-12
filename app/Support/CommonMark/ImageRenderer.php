<?php

namespace App\Support\CommonMark;

use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\ImageRenderer as BaseImageRenderer;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;
use League\CommonMark\Util\ConfigurationAwareInterface;
use League\CommonMark\Util\ConfigurationInterface;

class ImageRenderer implements InlineRendererInterface, ConfigurationAwareInterface
{
    /**
     * @var ConfigurationInterface
     */
    protected $config;

    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer)
    {
        $baseRenderer = new BaseImageRenderer();
        $baseRenderer->setConfiguration($this->config);

        $element = $baseRenderer->render($inline, $htmlRenderer);

        $src = $element->getAttribute('src');

        $element->setAttribute('src', asset($src));

        return $element;
    }

    public function setConfiguration(ConfigurationInterface $configuration)
    {
        $this->config = $configuration;
    }
}
