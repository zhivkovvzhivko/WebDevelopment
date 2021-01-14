<?php

namespace App\Http;

use App\Data\ErrorDTO;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }

    public function render(string $templateName, $data = null, $additionalData = [], $error = '') {
        $this->template->render($templateName, $data, $additionalData, $error);
    }

    public function redirect($url) {
        header('Location: '. $url);
    }
}
