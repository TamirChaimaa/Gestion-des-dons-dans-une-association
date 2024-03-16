<?php

namespace App\Service;

use App\Entity\Product;
use App\Entity\Order;

class ProductsHandler
{
    /**
     * @return array<Product>
     */
    public function getBestSeller(): array
    {
        $bestSellers = file_get_contents(__DIR__.'/../../fixtures/best_seller.json');
        $bestSellers = json_decode($bestSellers, true);

        $products = file_get_contents(__DIR__.'/../../fixtures/Product.json');
        $products = json_decode($products, true);

        $items = [];

        foreach ($bestSellers as $item) {
            foreach ($products as $key => $product) {
                if ($item['id'] === $key + 1) {
                    $productSeller = new Product();
                    $productSeller->setPrice((float) $product['price']);
                    $productSeller->setStock((int) $product['stock']);

                    $items[] = $productSeller;
                }
            }
        }

        return $this->sortProducts($items, 'stock', 'desc');
    }

    /**
     * @return array<Order>
     */
    public function getOrders(): array
    {
        $ordersData = file_get_contents(__DIR__.'/../../fixtures/Orders.json');
        $ordersData = json_decode($ordersData, true);

        $orders = [];
        foreach ($ordersData as $order) {
            $newOrder = new Order();
            $newOrder->setId($order['id']);
            $newOrder->setDateCommande(new \DateTime($order['date_commande']));

            // Supposez que le client_id dans Orders.json correspond à l'ID d'un client
            $client = $this->getClientById($order['client_id']);
            if ($client) {
                $newOrder->setClient($client);
            }

            $orders[] = $newOrder;
        }

        return $orders;
    }

    /**
     * Sort products by field using given sort order.
     *
     * @param array<Product> $items     products to sort
     * @param string         $field     concerned field by order
     * @param string         $sortOrder order type
     *
     * @return array<Product>
     */
    private function sortProducts(array $items, string $field, string $sortOrder): array
    {
        usort($items, function ($p1, $p2) use ($field, $sortOrder) {
            if ($field === 'stock') {
                $value1 =  $p1->getStock();
                $value2 =  $p2->getStock();
            }

            return $sortOrder === 'desc' ? $value2 - $value1 : $value1 - $value2;
        });

        return $items;
    }

    // Méthode privée pour récupérer un client par son ID
    private function getClientById(int $clientId): ?Client
    {
        // Votre implémentation de cette méthode
    }
}

?>