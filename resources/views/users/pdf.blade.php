<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Report</title>
</head>

<body style="font-family: sans-serif; margin: 0; padding: 0;">
    <div>
        <img src="resources/images/zslogo.png" alt="Logo">
    </div>
    <h1
        style="font-size: 17px; margin-bottom: 2rem; margin-top: 2rem; color: rgb(53, 53, 53); text-align: center; text-transform: uppercase;">
        INFORMATAT E PUNËTORIT
    </h1>
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>Name and Surname</div>
                    <div>Emri dhe Mbiemri</div>
                </th>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>Email</div>
                </th>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>ID number</div>
                    <div>Numri i ID-së</div>
                </th>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>Working position</div>
                    <div>Pozita e Punës</div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">{{ $user->name }}</td>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">{{ $user->email }}</td>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">{{ $user->personalIDnumber }}
                </td>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">{{ $user->position }}</td>
            </tr>
        </tbody>
    </table>

    <h1
        style="font-size: 17px; margin-bottom: 2rem; margin-top: 2rem; color: rgb(53, 53, 53); text-align: center; text-transform: uppercase;">
        Pushimet e aprovuara
    </h1>

    <table>
        <thead>
            <tr>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>Annual Leave</div>
                    <div>Pushim vjetor</div>
                </th>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>Parental Leave</div>
                    <div>Pushim familjar</div>
                </th>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>Sick Leave</div>
                    <div>Pushim mjekësor</div>
                </th>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>Compassionate Leave</div>
                    <div>Pushim gjatë rasteve vdekje</div>
                </th>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>Daily Rest</div>
                    <div>Pushim ditor</div>
                </th>
                <th
                    style="border: 1px solid #ccc; padding: 0.3rem; background-color: #eee; text-transform: uppercase; font-size: 10px;">
                    <div>Total Days Off</div>
                    <div>Gjithsej ditë pushimi</div>
                </th>
            </tr>

        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">
                    {{ $user->daysOff['Annual leave'] }}</td>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">
                    {{ $user->daysOff['Parental leave'] }}</td>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">
                    {{ $user->daysOff['Sick leave'] }}</td>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">
                    {{ $user->daysOff['Compassionate leave'] }}</td>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">
                    {{ $user->daysOff['Daily rest'] }}</td>
                <td style="border: 1px solid #ccc; padding: 0.3rem; text-align: center;">
                    {{ $user->daysOff['Annual leave'] + $user->daysOff['Parental leave'] + $user->daysOff['Sick leave'] + $user->daysOff['Compassionate leave'] + $user->daysOff['Daily rest'] }}
                </td>
            </tr>
        </tbody>
    </table>
    <h1
        style="font-size: 17px; margin-bottom: 2rem; margin-top: 2rem; color: rgb(53, 53, 53); text-align: center; text-transform: uppercase;">
        Autorizimi
    </h1>
    <table style="border-collapse: collapse; width: 100%;">

        <tbody>
            <tr>
                <td style="font-size: 10px;">
                    <div>Administrators signature</div>
                    <div>Nënshkrimi i administratorit</div>
                </td>
                <td style=" padding: 0.3rem; text-align: center;">_______________
                </td>
                <td style="padding:30px;"> </td>
                <td style="font-size: 10px;">
                    <div>Employees signature</div>
                    <div>Nënshkrimi i të punësuarit</div>
                </td>
                <td style="padding: 0.3rem; text-align: center;">_______________
                </td>

            </tr>
        </tbody>
    </table>
</body>

</html>
