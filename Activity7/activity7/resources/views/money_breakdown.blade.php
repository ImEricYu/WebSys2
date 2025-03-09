<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    {{-- 1. Page title --}}
    <title>Activity 7 : Money Breakdown</title>

  {{-- 2. CSS styles to color the number red (even) or green (odd) --}}
    <style>
        .even { color: red; }
        .odd { color: green; }
    </style>
 
</head>

<body>
     {{-- 3. Display the main heading --}}
    <h1>Ernico Uy - Activity 7</h1>

    {{-- 4. Display the money amount, applying the color class dynamically --}}
    <p>Money: <span class="{{ $color }}">{{ $amount }}</span></p>

    {{-- 5. Section title for breakdown --}}
    <h2>Breakdown:</h2>

    {{-- 6. Loop through the breakdown array and display each denomination and its count --}}
    <ul>
        @foreach ($breakdown as $denomination => $count)
            <li>{{ $denomination }}: {{ $count }}</li>
        @endforeach
    </ul>

    {{-- 7. Section title for number in words --}}
    <h2>In Words:</h2>

    {{-- 8. Display the number in words, applying the same color class --}}
    <p><span class="{{ $color }}">{{ $amountInWords }}</span></p>

</body>
</html>


