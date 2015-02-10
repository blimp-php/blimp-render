<?php
namespace Blimp\Render\Rest;

use Pimple\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

class Template {
    public function process(Container $api, Request $request, $_template) {
        $loader = new FilesystemLoader($api['render.templates.dir'] . '/%name%');

        $templating = new PhpEngine(new TemplateNameParser(), $loader);
        $templating->set(new SlotsHelper());

        $data = [];

        echo $templating->render($_template, $data);
    }
}
