<?php

require_once('./src/models/users.php');

class ListingResponse
{
    public  int $price;
    public  string $sellerName;
    public int $sellerId;
}

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
        $listing = [];
        $userModel = new Users();
        foreach ($this->listing as $item) {
            if ($item['itemId'] == $itemId) {
                $user = $userModel->getUser($item['sellerId']);
                $item['sellerName'] = $user[0]['name'];
                $listing[] = $item;
            }
        }
        return $listing;
    }

    private function removeListing($listingId)
    {
        $newListing = [];
        foreach ($this->listing as $item) {
            if ($item['id'] != $listingId) {
                $newListing[] = $item;
            }
        }
        $this->listing = $newListing;
        $pathname = __DIR__ . '/../../db/listing.json';
        file_put_contents($pathname, json_encode($this->listing));
    }

    public function buyItem($listingId)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $user = $_SESSION['user'];
        $foundListing = array_filter($this->listing, function ($item) use ($listingId) {
            return $item['id'] == $listingId;
        });
        // remove listing 
        $this->removeListing($listingId);

        return $foundListing;
    }
}
