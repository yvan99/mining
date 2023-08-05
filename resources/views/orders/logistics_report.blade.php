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
            <h4>Assigned Daily Order Report - {{ $ordersData->date }}</h4>

            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Client</th>
                        <th>Mineral</th>
                        <th>Quantity</th>
                        <th>Payment Status</th>
                        <th>Verif. Status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach (explode(',', $ordersData->order_ids) as $orderId)
                        @php
                            $order = \App\Models\Order::with('client', 'mineral')->find($orderId);
                        @endphp
                        <tr>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ $order->client->name }}</td>
                            <td>{{ $order->mineral->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>
                                @if ($order->payment_status == 'pending')
                                    <span
                                        class="order-bg-opacity-warning  text-warning rounded-pill active">Pending</span>
                                @else
                                    <span class="order-bg-opacity-success  text-success rounded-pill active">Paid</span>
                                @endif
                            </td>

                            <td>
                                @if ($order->inspection_status == 'pending')
                                    <span
                                        class="order-bg-opacity-warning  text-warning rounded-pill active">Pending</span>
                                @else
                                    <span
                                        class="order-bg-opacity-success  text-success rounded-pill active">Approved</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>

</html>
