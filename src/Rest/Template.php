<?php
namespace Blimp\Render\Rest;

use Pimple\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Template {
    public function process(Container $api, Request $request, $_view, $_model = null, $_route_params = null) {
        $data = null;

        if(!empty($_model)) {
            $c = new \ReflectionClass($_model);
            $m = $c->newInstance();

            $data = $m->process($api, $request, $_view, $_route_params);
        }

        $response = new Response(
            $api['render.engine']->render($_view, $data !== null ? $data : []),
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        return $response;
    }
}
