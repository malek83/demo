<?php

declare(strict_types=1);

namespace App\Response;

/**
 * Class JsonResponse
 * @package App\Response
 */
final class JsonResponse implements ResponseInterface
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * JsonResponse constructor.
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return \json_encode($this->data);
    }

    /**
     * @inheritDoc
     */
    public function headers(): array
    {
        return [];
    }
}
