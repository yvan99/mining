<!DOCTYPE html>
<html>

<head>
    <title>Daily Minerals Report</title>
    <style>
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
    @foreach ($mineralsByDate as $mineralsData)
        <div style="page-break-after: always;">
            <h3>Daily Minerals Report - {{ $mineralsData->date }}</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mine Tag</th>
                        <th>Quantity</th>
                        <th>Weight / Kg</th>
                        <th>Export Value / {{ env('PAYMENT_CURRENCY') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (explode(',', $mineralsData->mineral_ids) as $mineralId)
                        @php
                            $mineral = \App\Models\Mineral::find($mineralId);
                        @endphp
                        <tr>
                            <td>{{ $mineral->name }}</td>
                            <td>{{ $mineral->mine_tag }}</td>
                            <td>{{ $mineral->quantity }}</td>
                            <td>{{ $mineral->weight }}</td>
                            <td>{{ $mineral->exported_value }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"><strong>Totals</strong></td>
                        <td>{{ $totalQuantity }}</td>
                        <td>{{ $totalWeight }}</td>
                        <td>{{ $totalExportValue }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
</body>

</html>
