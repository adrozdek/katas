<?php
/*
 * Napisz funkcję która sprawdza czy słowo jest palindromem (funkcja ma nie zwracać uwagi na wielkosc liter). Ma zwracać wartość boolean.
 *
 * Przykłady
 * palindrom("ala") => true
 * palindrom("Ala") => true
 * palinfrom("pomarańcz") => false
 */

function palinfrom($word){
    $oneSign = str_split($word);
    //var_dump($oneSign);
    $length = strlen($word);
    if($length == 0){           // == !!!!!
        return false;
    }
    //var_dump($length);
    for($x = 0; $x < $length; $x++){
        //dwie wersje. jedna sprowadza do małych liter obydwa stringi, druga nie zwraca uwagi na wielkość podczas porównywania
        //strtolower żeby sprowadzić je do małych liter żeby nie odrzucało ze względu na różnicę w wielkości:

        //if((strtolower($oneSign[$x]) != (strtolower($oneSign[$length - 1])))){   //dwie wersje na if.
        if(strcasecmp($oneSign[$x], $oneSign[$length - 1]) != 0){
            //case-insensitive string comparison if(strcasecmp($va1, $var2) == 0)
            //Returns < 0 if str1 is less than str2; > 0 if str1 is greater than str2, and 0 if they are equal.
            return false;
        }
        $length--;
    }
    return true;
}


/*
 * Kod popniżej służy wygenerowaniu testów i strony poglądaowej - nie modyfikujcie go!
 */

$testCases = [["", false],["Ala", true], ["Pomarańcz",  false], ["abba", true], ["abcdDCBA", true]];
$results = "";
foreach($testCases as $case){
    if(($funcValue = palinfrom($case[0])) === $case[1]){
        $results .= "<tr class='success'><td> Ok </td><td>{$case[0]}</td><td>{$case[1]}</td><td>$funcValue</td></tr>";
    }
    else{
        $results .= "<tr class='danger'><td> Fail </td><td>{$case[0]}</td><td>{$case[1]}</td><td>$funcValue</td></tr>";
    }
}

echo("
<!DOCTYPE html>
<html lang='pl'>
  <head>
    <meta charset='utf-8'>

    <title>Palindromy</title>



    <link href='./css/bootstrap.min.css' rel='stylesheet'>

  </head>

  <body>

    <div class='container'>
      <div class='jumbotron'>

        <h1>Palindromy</h1>



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
