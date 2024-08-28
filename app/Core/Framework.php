<?php
namespace App\Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class Framework
{
    public function __construct(
        private UrlMatcher $matcher,
        private ControllerResolver $controllerResolver,
        private ArgumentResolver $argumentResolver,
    ) {
    }

    public function handle(Request $request): Response
    {
        $this->matcher->getContext()->fromRequest($request);
        dd($request->getPathInfo());
        try {
            $request->attributes->add($this->matcher->match($request->getPathInfo()));
            $controller = $this->controllerResolver->getController($request);
            $arguments = $this->argumentResolver->getArguments($request, $controller);

            return new Response( call_user_func_array($controller, $arguments));
        } catch (ResourceNotFoundException $exception) {
            return new Response($exception->getMessage(), 404);
        } catch (\Exception $exception) {
            return new Response('An error occurred while processing your request', 500);
        }
    }
}