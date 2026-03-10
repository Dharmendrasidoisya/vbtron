<?php

namespace Botble\Career\Contracts;

use Botble\Career\CareerCollection;

interface Career
{
    public function registerSchema(CareerCollection $careers): void;
}
