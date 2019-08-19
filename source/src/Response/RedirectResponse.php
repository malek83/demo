<?php

declare(strict_types=1);

namespace App\Response;

/**
 * Class RedirectResponse
 * @package App\Response
 */
class RedirectResponse implements ResponseInterface
{
    /**
     * @var string
     */
    private $location;

    /**
     * RedirectResponse constructor.
     * @param string $location
     */
    public function __construct(string $location)
    {
        $this->location = $location;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function headers(): array
    {
        return [
            'Location: ' . $this->location
        ];
    }
}
