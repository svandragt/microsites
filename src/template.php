<?php

namespace Svandragt\Microsites;

class Template
{
    protected $args;
    protected $file;

    public function __construct($file, $args = [])
    {
        $this->file = $file;
        $this->args = $args;
    }

    /** @noinspection MagicMethodsValidityInspection */
    public function __get($name)
    {
        return $this->args[ $name ];
    }

    public function render(): void
    {
        require $this->file;
    }
}
