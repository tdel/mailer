<?php


namespace App\Framework;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestJsonTransformer
{

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if (false === $this->isAvailable($request)) {
            return;
        }

        if (false === $this->transform($request)) {
            $response = new Response('Unable to parse JSON request.', Response::HTTP_BAD_REQUEST);

            $event->setResponse($response);
        }
    }

    private function isAvailable(Request $request): bool
    {
        return 'json' === $request->getContentType() && $request->getContent();
    }

    private function transform(Request $request): bool
    {
        try {
            $data = \json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            return false;
        }

        $request->request->replace($data);

        return true;
    }

}