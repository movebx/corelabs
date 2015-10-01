<?php

namespace Blog\Model;

use Framework\DI\Service;
use Framework\Exception\DatabaseException;
use Framework\Model\ActiveRecord;
use Framework\Validation\Filter\Length;
use Framework\Validation\Filter\NotBlank;

class Post extends ActiveRecord
{
    public $title;
    public $content;
    public $date;

    public static function getTable()
    {
        return 'posts';
    }

    public function save()
    {
        $db = Service::get('db');

        $query = 'INSERT INTO '.self::getTable().'(title, content, date) VALUES (:title, :content, :date)';

        $stmt = $db->prepare($query);

        if(!$stmt->execute(['title' => $this->title, 'content' => $this->content, 'date' => $this->date]))
            throw new DatabaseException('SQL BAD REQUEST');

    }

    public function getRules()
    {
        return array(
            'title'   => array(
                new NotBlank(),
                new Length(4, 100)
            ),
            'content' => array(new NotBlank())
        );
    }
}