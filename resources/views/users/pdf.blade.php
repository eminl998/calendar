<!DOCTYPE html>
<html>
<head>
    <title>User PDF</title>
</head>
<body>
    <h1>{{ $user->name }} PDF</h1>
    <p>ID: {{ $user->id }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Total Days Off: {{ $user->daysOff['Annual leave'] + $user->daysOff['Parental leave'] + $user->daysOff['Sick leave'] + $user->daysOff['Compassionate leave'] + $user->daysOff['Daily rest'] }}</p>
    <p>Annual Leave: {{ $user->daysOff['Annual leave'] }}</p>
    <p>Parental Leave: {{ $user->daysOff['Parental leave'] }}</p>
    <p>Sick Leave: {{ $user->daysOff['Sick leave'] }}</p>
    <p>Compassionate Leave: {{ $user->daysOff['Compassionate leave'] }}</p>
    <p>Daily Rest: {{ $user->daysOff['Daily rest'] }}</p>
</body>
</html>
