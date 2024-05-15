<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Order Details</h1>
    <p><strong>Order ID:</strong> {{ $viewData['order']->getId() }}</p>
    <p><strong>Total:</strong> {{ $viewData['order']->getTotal() }}</p>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewData['order']->getProducts() as $product)
                <tr>
                    <td>{{ $product->getName() }}</td>
                    <td>{{ $product->getPrice() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
