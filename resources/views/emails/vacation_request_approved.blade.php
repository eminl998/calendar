<!DOCTYPE html>
<html>
<head>
    <title>Vacation Request Approved</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>
    <p>Your vacation request has been approved. Here are the details:</p>
    <ul>
        <li>Date range: {{ $request->start_date }} to {{ $request->end_date }}</li>
        <li>Type of leave: {{ $request->leave_type }}</li>
    </ul>
    <p>Thank you,</p>
    <p>The Vianova Team</p>
</body>
</html>
