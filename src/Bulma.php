<?php

namespace Ridrog\Bulma;

class Bulma
{
    public $folders;

    public $directories;

    public $views;

    public function __construct()
    {
        $this->directories = config('bulma.directories');
    }
}