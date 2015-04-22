<?php
error_reporting(E_ALL);

include('dom/simple_html_dom.php');

if (!empty($_POST['query'])) {
    $query = $_POST['query'];
    $html = file_get_html($query);
    $output = $query;
    foreach ($html->find('.the_photo') as $e) {
        $output = $e->outertext . '<br>';
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>500px Get</title>
    <link rel="stylesheet" href="css/root.css" />
    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>
<body>
    <div id="main">
        <div class="box">
            <img src="images/500px-logo.jpg" alt="500px grabber">
            <form name="form1" method="post" action="index.php">
                <input class="query" placeholder="Ссылка на фото" name="query" type="text" value="<? echo $query; ?>">
                <input class="button" type="submit" name="Submit" value="Взять">
            </form>
        </div>
        <div class="image">
            <?=$output?>
        </div>
    </div>
</body>
</html>
