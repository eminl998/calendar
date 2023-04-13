<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Report</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: dark-gray;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 0.3rem;
            text-align: center;
        }

        th {
            background-color: #eee;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1 style="font-size:17px">{{ $user->name }}</h1>
    <p style="font-size:13px">Email: {{ $user->email }}</p>
    <p style="font-size:15px">Total Days Off: {{ $user->daysOff['Annual leave'] + $user->daysOff['Parental leave'] + $user->daysOff['Sick leave'] + $user->daysOff['Compassionate leave'] + $user->daysOff['Daily rest'] }}
    </p>
    <table>
        <thead>
            <tr>
                <th>Annual Leave</th>
                <th>Parental Leave</th>
                <th>Sick Leave</th>
                <th>Compassionate Leave</th>
                <th>Daily Rest</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->daysOff['Annual leave'] }}</td>
                <td>{{ $user->daysOff['Parental leave'] }}</td>
                <td>{{ $user->daysOff['Sick leave'] }}</td>
                <td>{{ $user->daysOff['Compassionate leave'] }}</td>
                <td>{{ $user->daysOff['Daily rest'] }}</td>
            </tr>

        </tbody>
    </table>
</body>

</html>
