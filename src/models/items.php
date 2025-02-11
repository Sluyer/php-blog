<?php

declare(strict_types=1);


class ItemType
{




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

    /**
     * @return ItemType[]
     *
     * @psalm-return array<ItemType>
     */
    public function getAll(): array|ItemType
    {
        return $this->items;
    }

    /**
     * @param int $selectedId
     *
     * @return array
     *
     * @psalm-return list<mixed>
     */
    public function getOne($selectedId): array
    {
        /** @var array $found 
         * @var array $item
         */
        $found = array_filter($this->items, function ($item) use ($selectedId) {
            return $item['id'] == $selectedId; //Attention aux == et aux === /!\
        });

        return array_values($found);
    }
    /**
     * @param (array|string)[]|string $query
     *
     * @psalm-param array<int|string, array<int|string, mixed>|string>|string $query
     *
     * @return ItemType[]
     *
     * @psalm-return list<ItemType>
     */
    public function search(string|array $query): array
    {
        /** @var array $found 
         * @var array $item
         */
        $query = strtolower($query);
        $found = array_filter($this->items, function ($item) use ($query) {
            return strpos(strtolower($item['name']), $query) !== false;
        });

        return array_values($found);
    }
}
