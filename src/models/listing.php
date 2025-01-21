<?php


class Listing
{
    // Sur un item, on à plusieurs vendeurs 
    private $listing;

    public function __construct()
    {
        $pathname = __DIR__ . '/../../db/listing.json';
        $this->listing = json_decode(file_get_contents($pathname), true);
    }

    public function getListingOfItem($itemId)
    {
        $found = array_filter($this->listing, function ($item) use ($itemId) {
            return $item['itemId'] === $itemId;
        });

        return array_values($found);
    }
}
