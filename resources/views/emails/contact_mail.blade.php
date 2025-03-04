<!-- resources/views/emails/reservation.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Reservation from email website </title>
</head>
<body>
    <h1>Reservation from email website </h1>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['sendEmail'] }}</p>
    <p><strong>Message:</strong> {{ $data['sendMessage'] }}</p>
    
    
</body>
</html>
