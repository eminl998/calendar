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
            font-size: 17px;
            margin-bottom: 2rem;
            margin-top: 2rem;
            color: rgb(53, 53, 53);
            text-align: center;
            text-transform: uppercase;

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
            font-size: 10px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        p {
            font-size: 15px;
        }
    </style>
</head>

<body>
    <h1>INFORMATAT E PUNËTORIT</h1>

    <p>Emri dhe Mbiemri: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Numri i ID-së: {{$user->id}}</p>
    <p>Pozita e Punën: COMMING SOON </p>

    <h1>Pushimet e aprovuara</h1>

    <table>
        <thead>
            <tr>
                <th>Annual Leave</th>
                <th>Parental Leave</th>
                <th>Sick Leave</th>
                <th>Compassionate Leave</th>
                <th>Daily Rest</th>
                <th>Total Days Off</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->daysOff['Annual leave'] }}</td>
                <td>{{ $user->daysOff['Parental leave'] }}</td>
                <td>{{ $user->daysOff['Sick leave'] }}</td>
                <td>{{ $user->daysOff['Compassionate leave'] }}</td>
                <td>{{ $user->daysOff['Daily rest'] }}</td>
                <td>{{ $user->daysOff['Annual leave'] + $user->daysOff['Parental leave'] + $user->daysOff['Sick leave'] + $user->daysOff['Compassionate leave'] + $user->daysOff['Daily rest'] }}
                </td>
            </tr>

        </tbody>
    </table>
</body>

</html>
