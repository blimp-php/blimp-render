<?php
namespace Blimp\Render;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

class RenderServiceProvider implements ServiceProviderInterface {
    public function register(Container $api) {
        $api['render.templates.dir'] = __DIR__;
        $api['render.templates.cache'] = __DIR__;

        $api['render.loader'] = function ($api) {
            return new FilesystemLoader($api['render.templates.dir'] . '/%name%.php');
        };

        $api['render.engine'] = function ($api) {
            $templating = new PhpEngine(new TemplateNameParser(), $api['render.loader']);
            $templating->set(new SlotsHelper());

            return $templating;
        };
    }
}
