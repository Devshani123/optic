<!-- resources/views/events/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
    <nav>
        <a href="{{ route('clubowner.dashboard') }}">Back to Dashboard</a>
    </nav>

    <h1>Create Event</h1>
    <form action="#" method="POST">
        @csrf
        <div>
            <label for="event_name">Event Name:</label>
            <input type="text" name="event_name" id="event_name" required>
        </div>
        <button type="submit">Create Event</button>
    </form>
</body>
</html>
