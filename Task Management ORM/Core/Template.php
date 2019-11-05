<?php

namespace Core;

class Template implements TemplateInterface
{
    const TEMPLATE_DIRECTORY = 'App/Templates/';
    const TEMPLATE_EXTENTION = '.php';

    public function render(string $templateName, $data, array $errors = [])
    {
        require_once self::TEMPLATE_DIRECTORY
            .$templateName
            .self::TEMPLATE_EXTENTION;
    }
}