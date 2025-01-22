<?php


class Listing
{
    // Sur un item, on à plusieurs vendeurs 
    /** @var array $listing */
    private $listing;

    public function __construct()
    {
        /** @var string $pathname */
        $pathname = __DIR__ . '/../../db/listing.json';
        $this->listing = json_decode(file_get_contents($pathname), true);
    }

    /**
     * @param int $itemId
     * @return array
     */
    public function getListingOfItem($itemId)
    {
        /** @var array $found 
         * @var array $item
        */
        $found = array_filter($this->listing, function ($item) use ($itemId) {
            return $item['itemId'] == $itemId;
        });

        return array_values($found);
    }
}
