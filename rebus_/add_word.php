<!DOCTYPE html>
<html>
<head>
    <?PHP
    session_start();
    require('session_validation.php');
    ?>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="javascript/typeahead.min.js"></script>
    <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
    <title>Rebus Add Word</title>
</head>
<body>
<?php
require('db_configuration.php');
require('InsertUtil.php');
?>
<?PHP echo getTopNav(); ?>

<div id="pop_up_fail" class="container pop_up" style="display:none">
    <div class="pop_up_background">
        <img class="pop_up_img_fail" src="pic/info_circle.png">
        <div class="pop_up_text">Incorrect! <br>Try Again!</div>
        <button class="pop_up_button" onclick="toggle_display('pop_up_fail')">OK</button>
    </div>
</div>

<div>
    <br>
    <br>
    <table class="table table-condensed main-tables" id="word_table" style="margin-left: 5%">
        <thead>
        <tr>
            <th>Word</th>
            <th>English Word</th>
            <th>Image Thumbnail</th>
        </tr>
        </thead>
        <tbody>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="container">
                    <div style="text-align:center">
                        <input class="main-buttons" type="submit" value="Add Words" name="submit"/>
                    </div>
                </div>
                <tr>
                    <td><input type="textbox" name="word0" id="name0"/></td>
                    <td><input type="textbox" name="eng_word0" id="eng_word0"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
                <tr>
                    <td><input type="textbox" name="word1" id="name1"/></td>
                    <td><input type="textbox" name="eng_word1" id="eng_word1"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
                <tr>
                    <td><input type="textbox" name="word2" id="name2"/></td>
                    <td><input type="textbox" name="eng_word2" id="eng_word2"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
                <tr>
                    <td><input type="textbox" name="word3" id="name3"/></td>
                    <td><input type="textbox" name="eng_word3" id="eng_word3"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
                <tr>
                    <td><input type="textbox" name="word4" id="name4"/></td>
                    <td><input type="textbox" name="eng_word4" id="eng_word4"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
                <tr>
                    <td><input type="textbox" name="word5" id="name5"/></td>
                    <td><input type="textbox" name="eng_word5" id="eng_word5"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
                <tr>
                    <td><input type="textbox" name="word6" id="name6"/></td>
                    <td><input type="textbox" name="eng_word6" id="eng_word6"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
                <tr>
                    <td><input type="textbox" name="word7" id="name7"/></td>
                    <td><input type="textbox" name="eng_word7" id="eng_word7"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
                <tr>
                    <td><input type="textbox" name="word8" id="name8"/></td>
                    <td><input type="textbox" name="eng_word8" id="eng_word8"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
                <tr>
                    <td><input type="textbox" name="word9" id="name9"/></td>
                    <td><input type="textbox" name="eng_word9" id="eng_word9"/></td>
                    <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload"/></td>
                </tr>
            </form>
        </div>

        <?php

        for($i=0; $i<10; $i++) {
//            if($_POST['$word'.$i] != null) {

                if (isset($_POST['submit'])) {
                    if (isset($_POST['word' . $i])) {
                        $word = $_POST['word' . $i];
                    }
                    if (isset($_POST['eng_word' . $i])) {
                        $eng = $_POST['eng_word' . $i];
                    }
                    //if (isset($_POST['fileToUpload'])) {
                    $inputFileName = $_FILES["fileToUpload"]["tmp_name"];
                    //echo $inputFileName;

                    $target_dir = "./Images/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    //echo $target_file;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $imageName = basename($_FILES["fileToUpload"]["name"]);
                    // echo $imageName;
                    if (!empty($imageName)) {
                        copy($inputFileName, $target_file);
                    }

                    insertIntoWordsTable($word, $eng, $imageName);
                    $word = null;
                    $eng = null;
//                }
//                else{
//                    continue;
//                }

            }
        }

        ?>
        <script>
            function validateForm() {
                var eng = document.forms["importFrom"]["fileToUpload"].value;
                if (eng == "") {

                    document.getElementById("error").style = "display:block;background-color: #ce4646;padding:5px;color:#fff;";
                    return false;
                }
            }

            function AddTableRows() {
                alert("add rows");
                // Find a <table> element with id="myTable":
                var table = document.getElementById("myTable");

                // Create an empty <tr> element and add it to the 1st position of the table:
                var row = table.insertRow(git);
            }

        </script>
        </tbody>
    </table>
</div>
</body>
</html>
