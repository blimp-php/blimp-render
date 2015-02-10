<?php
namespace Blimp\Render;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RenderServiceProvider implements ServiceProviderInterface {
    public function register(Container $api) {
        $api['render.templates.dir'] = __DIR__;
        $api['render.templates.cache'] = __DIR__;
    }
}
