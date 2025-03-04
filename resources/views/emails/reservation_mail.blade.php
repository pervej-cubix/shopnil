<!-- resources/views/emails/reservation.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Reservation request from website </title>
</head>
<body>
    <h1>Reservation request from website</h1>
    <p><strong>First Name:</strong> {{ $data['firstName'] }}</p>
    <p><strong>Last Name:</strong> {{ $data['lastName'] }}</p>
    <p><strong>Address:</strong> {{ $data['address'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Email:</strong> {{ $data['senderEmail'] }}</p>
    <p><strong>City:</strong> {{ $data['city'] }}</p>
    <p><strong>Check-In Date:</strong> {{ $data['check_in'] }}</p>
    <p><strong>Check-Out Date:</strong> {{ $data['check_out'] }}</p>
    <p><strong>Room Type:</strong> {{ $data['roomType'] }}</p>
    <p><strong>Number of Rooms:</strong> {{ $data['NumberOfRooms'] }}</p>
    <p><strong>Number of Persons:</strong> {{ $data['NumberOfPerson'] }}</p>
</body>
</html>
