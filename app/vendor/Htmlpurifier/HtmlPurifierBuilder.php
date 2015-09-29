<?php

namespace Htmlpurifier;

use Htmlpurifier\HtmlPurifier;

class HtmlPurifierBuilder
{
    private $_tags;

    public function __construct()
    {
        $this->_tags = array(

            'h1'		=> array('id', 'class'),
            'h2'		=> array('id', 'class'),
            'h3'		=> array('id', 'class'),
            'h4'		=> array('id', 'class'),
            'h5'		=> array('id', 'class'),
            'h6'		=> array('id', 'class'),

            'p'			=> array('id', 'class'),
            'span'		=> array('id', 'class'),
            'a'			=> array('id', 'class', 'href'),
            'img'		=> array('id', 'class', 'src', 'alt', FALSE),
            'br'		=> array(FALSE),
            'hr'		=> array(FALSE),

            'pre'		=> array('id', 'class'),
            'code'		=> array('id', 'class'),

            'ul'		=> array('id', 'class'),
            'ol'		=> array('id', 'class'),
            'li'		=> array('id', 'class'),

            'table'		=> array('id', 'class'),
            'tr'		=> array('id', 'class'),
            'td'		=> array('id', 'class'),
            'th'		=> array('id', 'class'),
            'thead'		=> array('id', 'class'),
            'tbody'		=> array('id', 'class'),
            'tfoot'		=> array('id', 'class'),

            'cut'		=> array('text', FALSE),
            'video'		=> array()
        );
    }
    public function execute()
    {
        return new HtmlPurifier($this->_tags);
    }

    public function addTag()
    {
        //@TODO:: DO
    }

    public function delTag()
    {
        //@TODO:: ....
    }
} 