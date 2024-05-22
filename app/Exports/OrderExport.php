<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class OrderExport implements FromCollection, WithHeadings
{
    protected $products;

    protected $order;

    public function __construct($order)
    {
        $this->products = $order->getProducts();
        $this->order = $order;

    }

    public function collection(): Collection
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
            'Order Total_Name' => 'Total',
            'Order Total' => $this->order->getTotal(),

        ]);

        $collection->push([
            'Order ID_Name' => 'Order ID',
            'Order ID' => $this->order->getId(),

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
        ];
    }
}
