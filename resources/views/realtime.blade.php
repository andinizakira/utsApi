<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier League Realtime</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .error {
            color: red;
            text-align: center;
        }

        .debug {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            margin: 20px 0;
            padding: 10px;
            font-family: monospace;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1> Tugas Abid Mustaghfirin</h1>
        <h2>2311081001</h2>


        <!-- Menampilkan error jika ada -->
        @if (isset($data['error']))
            <div class="error">Error: {{ $data['error'] }}</div>

        <!-- Menampilkan tabel jika data valid -->
        @elseif (isset($data['data']['cash_flow']) && is_array($data['data']['cash_flow']))
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Day</th>
                        <th>Currency</th>
                        <th>Net Income</th>
                        <th>Cash from Operations</th>
                        <th>Cash from Investing</th>
                        <th>Cash from Financing</th>
                        <th>Net Change in Cash</th>
                        <th>Free Cash Flow</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['data']['cash_flow'] as $team)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $team['date'] ?? '-' }}</td>
                            <td>{{ $team['year'] ?? '-' }}</td>
                            <td>{{ $team['month'] ?? '-' }}</td>
                            <td>{{ $team['day'] ?? '-' }}</td>
                            <td>{{ $team['currency'] ?? '-' }}</td>
                            <td>{{ number_format($team['net_income'] ?? 0) }}</td>
                            <td>{{ number_format($team['cash_from_operations'] ?? 0) }}</td>
                            <td>{{ number_format($team['cash_from_investing'] ?? 0) }}</td>
                            <td>{{ number_format($team['cash_from_financing'] ?? 0) }}</td>
                            <td>{{ number_format($team['net_change_in_cash'] ?? 0) }}</td>
                            <td>{{ number_format($team['free_cash_flow'] ?? 0) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="error">Data tidak tersedia atau format salah.</div>
        @endif
    </div>
</body>
</html>
