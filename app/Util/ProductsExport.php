<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace App\Util;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    protected $products;

    protected $order;

    public function __construct($products, $order)
    {
        $this->products = $products;
        $this->order = $order;

    }

    public function collection()
    {
        $collection = $this->products->map(function ($product) {
            return [
                'ID' => $product->id,
                'Name' => $product->name,
                'Description' => $product->description,
                'Category' => $product->category,
                'Price' => $product->price,

            ];
        });

        $collection->push([
            'Order ID' => $this->order->getId(),
            'Order Total' => $this->order->getTotal(),

        ]);

        return $collection;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'Category',
            'Price',
            'Order ID',
            'Order Total',
        ];
    }
}
