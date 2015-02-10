<?php
namespace Blimp\Render\Rest;

use Blimp\Http\BlimpHttpException;
use Pimple\Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;

class Template {
    public function process(Container $api, Request $request, $_template) {
        $loader = new FilesystemLoader($api['render.templates.dir']);

        $templating = new PhpEngine(new TemplateNameParser(), $loader);

        echo $templating->render($_template, array('firstname' => 'Fabien'));
    }
}
