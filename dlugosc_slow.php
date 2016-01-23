<?php
/*
 * Napisz funkcję która pobiera napis, dzieli go na poszczególne słowa i zwraca tablice z tymi słowami rozszerzonymi o ich długość
 * (pamiętaj oddzielić słowo i jego długość spacją).
 *
 * Przykłady:
 * wordLength("Ala ma kota") => ["Ala 3", "ma 2", "kota 4"]
 * wordLength("Dlugosc slow ma znaczenie") => ["Dlugosc 7", "slow 4", "ma 2", "znaczenie 9"]
 * wordLength("") => []
 */



function wordLength($text){
    //var_dump($text);
    $wordAndLength = array();
    $words = explode(" ", $text);  //rozbija string na pojedyncze stringi w miejscu gdzie występuje podany przerywnik(u nas spacja)
    $x = 0;
    if($text == null){
        $wordAndLength = [];
    }else{
        foreach ($words as $word) {
            $length = strlen($word);                  //dla każego elementu tablicy liczy długość
            $wordAndLength[$x] = ("$word $length");   //tworzy element nowej tablicy i zawiera("wyrażenie" "jego długość")
            $x++;                                    //dodaje jeden, żeby kolejne wyrażenia i ich długości były dodawane jako kolejne elementy tabeli
        }
        //var_dump($words);
        //var_dump($newArray);

    }
    return $wordAndLength;
}

//placki mają 6 długość, a nie 7 jak w kodzie sprawdzającym
//jeśli puste to długość 0 ma


/*
 * Kod popniżej służy wygenerowaniu testów i strony poglądaowej - nie modyfikujcie go!
 */

$testCases = [["", []],["Ala ma kota", ["Ala 3", "ma 2", "kota 4"]], ["Dlugosc slow ma znaczenie",  ["Dlugosc 7", "slow 4", "ma 2", "znaczenie 9"]], ["Lubie placki 7", ["Lubie 5", "placki 6", "7 1"]]];
$results = "";
foreach($testCases as $case){
    if(($funcValue = wordLength($case[0])) === $case[1]){
        $results .= "<tr class='success'><td> Ok </td><td>{$case[0]}</td><td>[".implode($case[1], ",")."]</td><td>[".implode($funcValue, ",")."]</td></tr>";
    }
    else{
        $results .= "<tr class='danger'><td> Fail </td><td>{$case[0]}</td><td>[".implode($case[1], ",")."]</td><td>[".implode($funcValue, ",")."]</td></tr>";
    }
}

echo("
<!DOCTYPE html>
<html lang='pl'>
  <head>
    <meta charset='utf-8'>
    <title>Długość słów</title>
    <link href='./css/bootstrap.min.css' rel='stylesheet'>

  </head>

  <body>

    <div class='container'>
      <div class='jumbotron'>
        <h1>Długość słów</h1>
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