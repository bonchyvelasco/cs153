<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
                if ($title == "Home") {
                    echo "Welcome";
                } else {
                    echo $title;
                }
            ?>
        </title>

        <script src = "resources/jquery-3.2.1.js" ></script>
        <link rel = "stylesheet" type = "text/css" href="resources/semantic/semantic.min.css" >
        <script src = "resources/semantic/semantic.min.js" ></script>
    </head>
    <body style = "height:1vh">
        <div class = "ui container" style = "margin-top: 75px">