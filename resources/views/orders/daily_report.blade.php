<!DOCTYPE html>
<html>

<head>
    <title>Daily Order Reports</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    @foreach ($ordersByDate as $ordersData)
        <div style="page-break-after: always;">
            <h3>Daily Order Report - {{ $ordersData->date }}</h3>

            <table>
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Mineral Name</th>
                        <th>Quantity</th>
                        <!-- Add more headers as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach (explode(',', $ordersData->order_ids) as $orderId)
                        @php
                            $order = \App\Models\Order::with('client', 'mineral')->find($orderId);
                        @endphp
                        <tr>
                            <td>{{ $order->client->name }}</td>
                            <td>{{ $order->mineral->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <!-- Add more columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>

</html>
