<?php

declare(strict_types=1);

namespace App\Controller;

use App\Request\RequestInterface;
use App\Response\JsonResponse;
use App\Response\ResponseInterface;

/**
 * Class TestController
 * @package App\Controller
 */
class HealthController extends AbstractController implements ControllerInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function check(RequestInterface $request): ResponseInterface
    {
        return new JsonResponse(true);
    }
}
