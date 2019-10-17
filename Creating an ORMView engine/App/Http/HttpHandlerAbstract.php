<?php

namespace App\Http;

use Core\TemplateInterface;

class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    public function render(string $templateName, $data = null)
    {
        $this->template->render($templateName, $data);
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
    }
}