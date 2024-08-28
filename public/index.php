<?php

require_once __DIR__ ."/../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
require_once __DIR__ ."/../routes/web.php";

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$controllerResolver = new HttpKernel\Controller\ControllerResolver();
$argumentResolver = new HttpKernel\Controller\ArgumentResolver();

$framework = new App\Core\Framework($matcher, $controllerResolver, $argumentResolver);
// dd($request->getPathInfo());
$response = $framework->handle($request);

$response->send();