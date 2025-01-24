<?php

declare(strict_types=1);


class ItemType
{
    public string $id;
    public string $name;
    public string $description;
    public string $image;
}

class Items
{
    /** @var array<ItemType> $items */
    public $items;

    public function __construct()
    {
        /** @var string $pathname */
        $pathname = __DIR__ . '/../../db/items.json';
        $this->items = json_decode(file_get_contents($pathname), true);
    }

    public function getAll(): array|ItemType
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
