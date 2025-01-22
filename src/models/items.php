<?php

class Items
{
    private $items;

    public function __construct()
    {
        $pathname = __DIR__ . '/../../db/items.json';
        $this->items = json_decode(file_get_contents($pathname), true);
    }

    public function getAll()
    {
        return $this->items;
    }

    public function getOne($selectedId)
    {
        $found = array_filter($this->items, function ($item) use ($selectedId) {
            return $item['id'] === $selectedId;
        });

        return array_values($found); 
    }
}
