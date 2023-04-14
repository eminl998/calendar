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

    <div>
        <img src="/images/zslogo.png" alt="Logo" />
    </div>


    <h1>INFORMATAT E PUNËTORIT</h1>

    <table>
        <thead>
            <tr>
                <th>
                    <div>Name and Surname</div>
                    <div>Emri dhe Mbiemri</div>
                </th>
                <th>
                    <div>Email</div>
                </th>
                <th>
                    <div>ID number</div>
                    <div>Numri i ID-së</div>
                </th>
                <th>
                    <div>Working position</div>
                    <div>Pozita e Punës</div>
                </th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->id }}</td>
                <td>COMMING SOON</td>
            </tr>

        </tbody>
    </table>

    <h1>Pushimet e aprovuara</h1>

    <table>
        <thead>
            <tr>
                <th>
                    <div>Annual Leave</div>
                    <div>Pushim vjetor</div>
                </th>
                <th>
                    <div>Parental Leave</div>
                    <div>Pushim familjar</div>
                </th>
                <th>
                    <div>Sick Leave</div>
                    <div>Pushim mjekësor</div>
                </th>
                <th>
                    <div>Compassionate Leave</div>
                    <div>Pushim gjatë rasteve vdekje</div>
                </th>
                <th>
                    <div>Daily Rest</div>
                    <div>Pushim ditor</div>
                </th>
                <th>
                    <div>Total Days Off</div>
                    <div>Gjithsej ditë pushimi</div>
                </th>
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
