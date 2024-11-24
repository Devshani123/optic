<!-- resources/views/clubs/my.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Clubs</title>
</head>
<body>
    <h1>My Clubs</h1>
    <p>Here are the clubs you are a member of:</p>

    @if($clubs->isEmpty())
        <p>You are not a member of any clubs.</p>
    @else
        <ul>
            @foreach ($clubs as $club)
                <div>
                    <h2>{{ $club->name }}</h2>
                    <p>{{ $club->description }}</p>
                    <!-- Other club details can be displayed here -->
                </div>
            @endforeach
        </ul>
    @endif
</body>
</html>
