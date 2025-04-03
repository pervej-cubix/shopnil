<!-- resources/views/emails/reservation.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Reservation request from website </title>
</head>
<body>
    <h1>Reservation Request from Website</h1>

    <p><strong>Title:</strong> {{ $data['title'] }}</p>
    <p><strong>First Name:</strong> {{ $data['first_name'] }}</p>
    <p><strong>Last Name:</strong> {{ $data['last_name'] }}</p>
    <p><strong>Address:</strong> {{ $data['address'] }}</p>
    <p><strong>Country:</strong> {{ $data['country'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Check-In Date:</strong> {{ $data['checkin'] }}</p>
    <p><strong>Check-Out Date:</strong> {{ $data['checkout'] }}</p>
    <p><strong>Room Type:</strong> {{ $data['room_type'] }}</p>
    <p><strong>Number of Rooms:</strong> {{ $data['room_no'] }}</p>
    <p><strong>Number of Adults:</strong> {{ $data['adult_no'] }}</p>
    <p><strong>Number of Children:</strong> {{ $data['child_no'] ?? 'N/A' }}</p>
    <p><strong>Additional Requirements:</strong> {{ $data['requirements'] ?? 'None' }}</p>
</body>
</html>
