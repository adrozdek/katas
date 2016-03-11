<?php
/*
 * Napisz funkcję która pobiera tablicę i zwraca tablice w z usuniętymi duplikatami.
 *
 * Przykłady:
 * findDuplicates([1,2, "jan", "kowlaski", 2, "jan"]) => [1,2, "jan", "kowlaski"]
 * findDuplicates([3.4, "jablko", 'banan', 'banan', "gruszka", 5]) => [3.4, "jablko", 'banan', "gruszka", 5]
 * findDuplicates([1,2, 3, "jablko", 'banan']) => [1,2, 3, "jablko", 'banan']
 */

function findDuplicates($table){
    //$removed = array_unique($table);   // usuwa duplikaty z tablicy. nie działa dla (3.4 itd) - pokazuje to samo ale nie świeci się na ok
    $length = count($table);
    $withoutReplicates = array();
    $z = 0;
    $removedNull = array();
    for($x = 0; $x < $length; $x++) {
        $repeated = $table[$x];
        $withoutReplicates[$z] = $repeated;
        for ($y = 0; $y < $length; $y++) {
            if($x != $y) {
                if ($repeated == $table[$y]) {
                    $table[$y] = null;
                    $y = $length;
                }
            }
        }
        $z++;
    }
    $y = 0;
    foreach($withoutReplicates as $table) {
        if ($table != null) {
            $removedNull[$y] = $table;
        }
        $y++;
    }
    $arrayValues = array_values($removedNull);  //klucze od 0 liczone
    //var_dump($withoutReplicates);
    //var_dump($removedNull);
    //var_dump($arrayValues);
    return $arrayValues;
}


/*
 * Kod popniżej służy wygenerowaniu testów i strony poglądaowej - nie modyfikujcie go!
 */

$testCases = [[[1,2, "jan", "kowlaski", 2, "jan"], [1,2, "jan", "kowlaski"]], [[3.4, "jablko", 'banan', 'banan', "gruszka", 5],  [3.4, "jablko", 'banan', "gruszka", 5]],
    [[1,2, 3, "jablko", 'banan'], [1,2, 3, "jablko", 'banan']], [[],[]], [[1,2,3,4], [1,2,3,4]]];
$results = "";
foreach($testCases as $case){
    if(($funcValue = findDuplicates($case[0])) === $case[1]){
        $results .= "<tr class='success'><td> Ok </td><td>[".implode($case[0], ",")."] </td><td>[".implode($case[1], ",")."]</td><td>[".implode($funcValue, ",")."]</td></tr>";
    }
    else{
        $results .= "<tr class='danger'><td> Fail </td><td> [".implode($case[0], ",")."] </td><td>[".implode($case[1], ",")."]</td><td>[".implode($funcValue, ",")."]</td></tr>";
    }
}

echo("
<!DOCTYPE html>
<html lang='pl'>
  <head>
    <meta charset='utf-8'>
    <title>Usuń duplikaty</title>
    <link href='./css/bootstrap.min.css' rel='stylesheet'>

  </head>

  <body>

    <div class='container'>
      <div class='jumbotron'>
        <h1>Usuń duplikaty</h1>
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