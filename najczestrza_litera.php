<?php
/*
 * Napisz funkcję która pobiera napis, a zwróci tablice w której pierwszyme lementem będzie najczęściej występujący znak, a drugim ile razy ten znak wystapił z tym napisie.
 * W przypadku w ktorym kilka znaków ma taką samą ilość powtórzeń powinien być zwrócony ten który wystepuje najwcześniej w podanym napisie
 *
 * Przykłady:
 * mostOftenCharacter("Ala ma kota") => ['a', 3] // Duża litera A to inny znak
 * mostOftenCharacter("kkkeefflll") => ['k', 3] // k i l majątyle samo powtórzeń ale k jest wcześniej
 */

function mostOftenCharacter($text){
    $length = strlen($text);
    //var_dump($text);
    $frequency = array();                   //tabela do której wpisuje ile razy każdy znak wystąpił
    for($x = 0; $x < $length; $x++){
        $count = 0;
        for($y = 0; $y < $length; $y++){
            if($text[$x] == $text[$y]){
                $count += 1;
            }
        }
        $frequency[$x] = $count;
    }
    $maxTimes = $frequency[0];   //$maxTimes przymuje ilość wystąpień pierwszego znaku jako największą i weryfikuje to przez ilość wystąpień reszty znaków
    $letter = $text[0];          //$letter przyjmuje pierwszy znak jako najczęściej występujący.
    //var_dump($max);
    for($x = 1; $x < $length; $x++){
        if($frequency[$x] > $maxTimes){
            $maxTimes = $frequency[$x];    //jeśli któryś z kolejnych znaków wystąpił więcej razy niż sprawdzany zostanie on zastąpiony jak i częstość wystąpień
            $letter = $text[$x];          // na nowy dany znak i jego ilość wystąpień. następnie sprawdzane są kolejne częstotliwości wystąpienia
        }
    }
    //var_dump($letter);
    //var_dump($max);
    //var_dump($table);
    $mostOftenCharacter = array($letter, $maxTimes);
    return $mostOftenCharacter;
}


/*
 * Kod popniżej służy wygenerowaniu testów i strony poglądaowej - nie modyfikujcie go!
 */

$testCases = [["Ala ma kota", ['a', 3]], ["kkkeefflll",  ['k', 3]], ["elkkeldsllael", ["l", 5]], ["ertTTtrr", ["r", 3]]];
$results = "";
foreach($testCases as $case){
    if(($funcValue = mostOftenCharacter($case[0])) === $case[1]){
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
    <title>Najczęściej występujący znak</title>
    <link href='./css/bootstrap.min.css' rel='stylesheet'>

  </head>

  <body>

    <div class='container'>
      <div class='jumbotron'>
        <h1>Najczęściej występujący znak</h1>
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