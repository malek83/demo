<?php

declare(strict_types=1);

namespace App\Response;

/**
 * Class HtmlResponse
 * @package App\Response
 */
final class HtmlResponse implements ResponseInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $view;

    /**
     * @var string
     */
    private $layout;

    /**
     * @var string
     */
    private const TEMPLATE_DIRECTORY = '/../../templates/';

    /**
     * HtmlResponse constructor.
     * @param array $data
     * @param string $view
     * @param string $layout
     */
    public function __construct(array $data, string $view, string $layout = 'base.php')
    {
        $this->data = $data;
        $this->view = $view;
        $this->layout = $layout;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->getTemplateContent($this->layout);
    }

    /**
     * @param $template
     * @return string
     */
    private function getTemplateContent($template): string
    {
        ob_start();

        include(__DIR__ . self::TEMPLATE_DIRECTORY . $template);
        $content = ob_get_contents();
        ob_get_clean();

        return $content;
    }

    /**
     * @inheritDoc
     */
    public function headers(): array
    {
        return [];
    }
}
