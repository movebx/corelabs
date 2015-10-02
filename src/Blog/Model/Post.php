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

    static public function find($id)
    {
        $db = Service::get('db');

        if($id == 'all')
            $query = 'SELECT p.id, p.title, p.content, p.date, u.name FROM '.static::getTable().' p INNER JOIN '.User::getTable().' u ON p.user = u.id';
        else
            $query = 'SELECT p.id, p.title, p.content, p.date, u.name FROM '.static::getTable().' p INNER JOIN '.User::getTable().' u ON p.user = u.id WHERE p.id = :id';

        $stmt = $db->prepare($query);
        $stmt->execute([':id' => $id]);

        $result = ($id == 'all') ? $stmt->fetchAll(\PDO::FETCH_OBJ) : $stmt->fetch(\PDO::FETCH_OBJ);

        return $result;
    }

    public function save()
    {
        $db = Service::get('db');



        $security = Service::get('security');

        $user = $security->getUser();
        $userId = is_null($user) ? 5 : $user->id;



        $query = 'INSERT INTO '.self::getTable().'(title, content, date, user) VALUES (:title, :content, :date, :user)';

        $stmt = $db->prepare($query);

        if(!$stmt->execute(['title' => $this->title, 'content' => $this->content, 'date' => $this->date, 'user' => $userId]))
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