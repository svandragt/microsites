<?php

namespace Svandragt\Microsites;

// @link http://stackoverflow.com/questions/62617/whats-the-best-way-to-separate-php-code-and-html
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
