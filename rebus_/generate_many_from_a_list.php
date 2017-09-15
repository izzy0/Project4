
<!DOCTYPE html>
<html>
<head>

    <?PHP
    session_start();
    require('session_validation.php');
    require('ManyFromAListFunctions.php');
    require('word_processor.php');
    require_once('telugu_parser.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Set starting variables gotten from post
        $wordInputFromTextBox = $_POST["wordInput"];
        $wordsArray = explode("\n", $wordInputFromTextBox);
        // Do something about blank entries
        $firstValidWordInArray = $wordsArray[0];

        $manyFromAListFunctions = new ManyFromAListFunctions($firstValidWordInArray);
    } else {
//        $url = "index.php";
//
//        header("Location: " . $url);
        die();
    }

    ?>
    <?PHP echo getTopNav(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/main_style.css" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
</head>
<title>Rebus Many-From-A-List</title>
<div class="puzzleResult" align="left">
    <h3><b>Input Word List:</b></h3>
    <br/>
    <?php

    $rows = sizeof($wordsArray);

    for ($input = 0; $input < $rows; $input++) {
        $incrementedValue = $input + 1;
        if($input === ($rows - 1)){
            echo $wordsArray[$input]."&nbsp";
        }else{
            echo $wordsArray[$input].",&nbsp";
        }
    }
    ?>
    <br/>
    <h3><b>Puzzles</b></h3>
    <br/>

</div>
<body>
<?php

for ($i = 0; $i < count($wordsArray); $i++) {
    // Set the source word "input"
    $sourceWord = $wordsArray[$i];

    $sourceWordCharactersArray = str_split($sourceWord);

    $formateStr = null;
    $formateStr.= $sourceWord." = ";

//    echo "---- formated String start: ".$formateStr."<br>";

    // Check if any of the characters exist in destination word
    for ($char = 0; $char < strlen($sourceWord); $char++) {

        $characterCheck = $sourceWordCharactersArray[$char];
        // Find 'unused' word after source word
        for ($j = 0; $j < count($wordsArray); $j++) {
            // If index of array is the same, then it's the same source word so skip to next word
            if ($i == $j) {
                continue;
            }
            // Set the "destination" word as word to be checked
            $wordCheck = trim($wordsArray[$j]);
            // Check if word is still available
            $wordIsAvailable = $manyFromAListFunctions->isWordAvailable($wordCheck);
            // If word is available...
            if ($wordIsAvailable) {
                // Return index of char if it exist in word, otherwise will get null
                $indexOfCharInWord = $manyFromAListFunctions->getCharacterIndexInWord($characterCheck, $wordCheck);
                // If index is found
                if ($indexOfCharInWord != null) {
                    // get the length of $wordCheck
                    $lengthOfWordCheck = strlen($wordCheck);

                    // FOUND MATCH: $indexOfCharInWord/$lengthOfWordCheck ($wordCheck )
                    $formateStr = $formateStr .= $indexOfCharInWord . "/" . $lengthOfWordCheck . " (" . $wordCheck . ")";

                    if ($char != strlen($sourceWord) - 2)
                        $formateStr = $formateStr . " + ";

                    // Go to next letter
                    break;
                }
            }

        }
    }
    echo $formateStr."<br>";
}
?>
</body>
</html>
