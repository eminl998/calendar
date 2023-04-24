<!DOCTYPE html>
<html>
<head>
    <title>Hello Admin,</title>
</head>
<body>
    <p>{{ $user->name }} has submitted a new vacation request:</p>
    <p>Your vacation request has been declined. Here are the details:</p>
    <ul>
        <li><strong>Start Date:</strong> {{ $vacationRequest->start_date }}</li>
        <li><strong>End Date:</strong> {{ $vacationRequest->end_date }}</li>
        <li><strong>Leave Type:</strong> {{ $vacationRequest->leave_type }}</li>
    </ul>
    <p>Please log in to the system to approve or reject this request.</p>

    <p>Thanks,<br>
    <p>The Vianova Team</p>
</body>
</html>

