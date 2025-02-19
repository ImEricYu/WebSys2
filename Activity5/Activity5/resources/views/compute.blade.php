
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Itakda ang character encoding ng dokumento bilang UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Itakda ang viewport para sa responsiveness -->
    <title>Activity 5</title> <!-- Itakda ang title ng webpage -->
    <style>
        .green-box { background-color: green; color: white; padding: 15px; display: inline-block; border: 2px solid black; width: 100px; text-align: center; } /* Estilo para sa green box */
        .blue-box { background-color: blue; color: white; padding: 15px; display: inline-block; width: 100px; text-align: center; } /* Estilo para sa blue box */
        .red-box { background-color: red; color: white; padding: 15px; display: inline-block; border: 2px solid black; } /* Estilo para sa red box */
        .orange { color: orange; } /* Estilo para sa orange text */
        .blue { color: blue; } /* Estilo para sa blue text */
        .green { color: green; font-weight: bold; } /* Estilo para sa green text na bold */
        .blue-text { color: blue; font-weight: bold; } /* Estilo para sa blue text na bold */
    </style>
</head>
<body>

    <h2>Ernico B. Uy | BSIT-3A</h2> <!-- Display ng pangalan at section -->

    <p>URL: http://127.0.0.1:8000//{{ $operation1 }}/{{ $val1 }}/{{ $val2 }}/{{ $operation2 }}/{{ $val3 }}/{{ $val4 }}</p> <!-- Display ng URL -->

    <br>

    @foreach ([
        ['op' => $operation1, 'v1' => $val1, 'v2' => $val2, 'res' => $result1, 'err' => $error1],
        ['op' => $operation2, 'v1' => $val3, 'v2' => $val4, 'res' => $result2, 'err' => $error2]
    ] as $calc) <!-- Loop sa dalawang set ng kalkulasyon -->
        <p>Value 1: <span class="{{ $calc['v1'] % 2 == 0 ? 'orange' : 'blue' }}">{{ $calc['v1'] }}</span></p> <!-- Display ng Value 1 na may kulay depende kung even o odd -->
        <p>Value 2: <span class="{{ $calc['v2'] % 2 == 0 ? 'orange' : 'blue' }}">{{ $calc['v2'] }}</span></p> <!-- Display ng Value 2 na may kulay depende kung even o odd -->
        <p>Operator: {{ $calc['op'] }}</p> <!-- Display ng operator -->

        @if ($calc['err']) <!-- Kung may error, display ito sa red box -->
            <p><span class="red-box">{{ $calc['err'] }}</span></p>
        @else <!-- Kung walang error, display ang resulta -->
            <p>
                <span class="{{ $calc['res'] % 2 == 0 ? 'green' : 'blue-text' }}">
                    Result (Displayed in {{ $calc['res'] % 2 == 0 ? 'Green' : 'BLUE' }}): 
                </span>
                <span class="{{ $calc['res'] % 2 == 0 ? 'green-box' : 'blue-box' }}">{{ $calc['res'] }}</span>
            </p>
        @endif
        <br>
    @endforeach

</body>
</html>