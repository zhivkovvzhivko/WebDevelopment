<?php

namespace Core;

use App\Data\ErrorDTO;

class Template implements TemplateInterface
{
    const TEMPLATE_DIRECTORY = 'App/Templates/';
    const TEMPLATE_EXTENTION = '.php';

    public function render(string $templateName, $data, $additionalData, $error)
    {
        require_once self::TEMPLATE_DIRECTORY
                        .$templateName
                        .self::TEMPLATE_EXTENTION;
    }
}