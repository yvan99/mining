<!DOCTYPE html>
<html>

<head>
    <title>Daily Payment Reports</title>
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
    @foreach ($paymentsByDate as $paymentsData)
        <div style="page-break-after: always;">
            <h4>Daily Payment Report - {{ $paymentsData->date }}</h4>

            <table>
                <thead>
                    <tr>
                        <th>FLW ID</th>
                        <th>Amount</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gateway</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalAmount = 0;
                    @endphp
                    @foreach (explode(',', $paymentsData->payment_ids) as $paymentId)
                        @php
                            $payment = \App\Models\Payment::find($paymentId);
                            $totalAmount += $payment->amount;
                        @endphp
                        <tr>
                            <td>{{ $payment->flw_id }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->names }}</td>
                            <td>{{ $payment->email }}</td>
                            <td>{{ $payment->gateway }}</td>
                            <!-- Add more columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td>{{ $totalAmount }} {{env("PAYMENT_CURRENCY")}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endforeach
</body>

</html>
