<?php
namespace App\Utilities;

class StripTags
{
    protected $text = '';
    protected $allowedTags = '';

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function not(array $notAllowedTags)
    {
        $this->allowedTags = array_diff($this->tags(), $notAllowedTags);
    }

    public function allow(array $allowedTags)
    {
        $this->allowedTags = $allowedTags;
    }

    public function strip()
    {
        $allowedTags = $this->make();

        return strip_tags($this->text, $allowedTags);
    }

    protected function make()
    {
        $tags = implode('><' ,$this->allowedTags);

        return '<' . $tags . '>';
    }

    protected function tags()
    {
        return [
            'br',
            'body',
            'html',
            'head',
            'meta',
            'link'
        ];
    }
}