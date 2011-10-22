<?php
namespace hanasaki\samples;

require_once '__init__.php';

/**
 * Hanasaki Entity
 */
class Hanasaki
{
    private $id;
    private $name;
    private $body;
    private $created_at;
    private $updated_at;

    public function __get($name)
    {
        return isset($this->{$name}) ? $this->{$name} : null;
    }
}

$hanasaki = connection();

$object_list = $hanasaki
    ->prepare('SELECT * FROM hanasaki')
    ->execute()
    // ->fetchEntity('hanasaki\samples\Hanasaki');
    ->fetchEntities('hanasaki\samples\Hanasaki');

foreach ($object_list as $object)
{
    echo "            id: {$object->id}", PHP_EOL;
    echo "          name: {$object->name}", PHP_EOL;
    echo "          body: {$object->body}", PHP_EOL;
    echo "    created_at: {$object->created_at}", PHP_EOL;
    echo "    updated_at: {$object->updated_at}", PHP_EOL, PHP_EOL;
}

