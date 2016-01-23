<?php
/*
 * Napisz funkcje która będzie pobierać liczbę całkowitą i sprawdzać jej 3 właściwości:
 * 1. Czy liczba jest pierwsza?
 * 2. Czy liczba jest parzysta?
 * 3. Czy liczba jest wielokrotnością 10?
 *
 * Funkcja ma zwracać tabelę z 3 wartościami bool (true lub false).
 *
 * Przykład:
 * mathTest(1234) => [false, true, false]
 * mathTest(20) => [false, true, true]
 * mathTest(3) => [true, false, false]
 */


function mathTest($number){
    $table = array();
    if($number > 0){    // > 1?
        $table[0] = true;
        for($x = 2; $x < $number; $x++){
            if($number % $x == 0){
                $table[0] = false;
            }
        }
    }
    else{
        $table[0] = false;
    }
    if($number % 2 == 0){
        $table[1] = true;
    }
    else{
        $table[1] = false;
    }
    if($number % 10 == 0){
        $table[2] = true;
    }
    else{
        $table[2] = false;
    }
    return $table;
}

/*
 * Kod popniżej służy wygenerowaniu testów i strony poglądaowej - nie modyfikujcie go!
 */

$testCases = [[1, [true, false, false]], [20, [false, true, true]], [74088, [false, true, false]], [9, [false, false, false]]];
$results = "";
foreach($testCases as $case){
    if(($funcValue = mathTest($case[0])) === $case[1]){
        $results .= "<tr class='success'><td> Ok </td><td> {$case[0]} </td><td>[".implode($case[1], ",")."]</td><td>[".implode($funcValue, ",")."]</td></tr>";
    }
    else{
        $results .= "<tr class='danger'><td> Fail </td><td> {$case[0]} </td><td>[".implode($case[1], ",")."]</td><td>[".implode($funcValue, ",")."]</td></tr>";
    }
}

echo("
<!DOCTYPE html>
<html lang='pl'>
  <head>
    <meta charset='utf-8'>
    <title>Test matematyczny</title>
    <link href='./css/bootstrap.min.css' rel='stylesheet'>

  </head>

  <body>

    <div class='container'>
      <div class='jumbotron'>
        <h1>Test matematyczny</h1>
        <p><a class='btn btn-lg btn-success' href='javascript:window.location.reload();' role='button'>Odśwież</a></p>
      </div>

      <div class='row'>
          <h1>Testy:</h1>
          <table class='table'>
            <thead>
              <tr>
                <th>Stan testu:</th>
                <th>Dane:</th>
                <th>Wartość spodziewana:</th>
                <th>Wartość otrzymana:</th>
              </tr>
            </thead>
            <tbody>
                $results
            </tbody>
          </table>
      </div>
    </div>
  </body>
</html>
");