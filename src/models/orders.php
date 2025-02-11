<?php

class Orders
{

    /** @var array $orders */
    private $orders = array();
    public function __construct()
    {
        /** @var string $pathname */
        $pathname = __DIR__ . '/../../db/orders.json';
        $this->orders = json_decode(file_get_contents($pathname), true);
    }

    // place an order on a listing 
    /**
     * @param int $listingId
     * @param int $userId
     *
     * @return (int|string)[]
     *
     * @psalm-return array{id: string, listingId: int, userId: int, status: 'pending'}
     */
    public function placeOrder($listingId, $userId): array
    {
        $order = [
            'id' => uniqid(),
            'listingId' => $listingId,
            'userId' => $userId,
            'status' => 'pending'
        ];

        array_push($this->orders, $order);
        $this->save();
        return $order;
    }

    private function save(): void
    {
        $pathname = __DIR__ . '/../../db/orders.json';
        file_put_contents($pathname, json_encode($this->orders, JSON_PRETTY_PRINT));
    }
}
