<?php

namespace Core;

use App\Data\ErrorDTO;

interface TemplateInterface
{
    public function render(string $templateName, $data, $additionalData, $error);
}