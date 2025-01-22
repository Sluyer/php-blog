<?php

class Items
{
    /** @var array $items */
    private $items;

    public function __construct()
    {
        /** @var string $pathname */
        $pathname = __DIR__ . '/../../db/items.json';
        $this->items = json_decode(file_get_contents($pathname), true);
    }

    public function getAll()
    {
        return $this->items;
    }

    /**
     * @param int $selectedId
     * @return array
     */
    public function getOne($selectedId)
    {
        /** @var array $found 
         * @var array $item
        */
        $found = array_filter($this->items, function ($item) use ($selectedId) {
            return $item['id'] == $selectedId; //Attention aux == et aux === /!\
        });

        return array_values($found); 
    }
}
