<?php

require_once('core/functions.php');
require_once('config.php');

//pdebug($_GET);
if (isset($_GET['pdf'])) {
    $current_pdf = "http://" .Config::get('host');
    $current_pdf.= ":"       .Config::get('port');
    $current_pdf.= "/"       .Config::get('pdf.folder');
    $current_pdf.= "/"       .$_GET['pdf'];
} else {
    $current_pdf = "";
}

$pdf_files = array();
if ($handle = opendir(Config::get('pdf.folder'))) {
    while (false !== ($entry = readdir($handle))) {
        if (in_array(pathinfo($entry, PATHINFO_EXTENSION ), array("pdf", "PDF"))) {
            $pdf_files[] = $entry;
        }
    }
    closedir($handle);
}


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="core/functions.js" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
        $('#pdf_view').bind('click', alert("hello"));
    }
    </script>
</head>
<body>
    <div id="right_frame">
        <!-- src="http://localhost/PDFs/test.pdf" -->
        <iframe src="<?php echo $current_pdf ?>" 
                id="pdf_view"
                width="100%"
                height="100%"
                onclick="hideSidebar()"
                >
        </iframe>
    </div>

    <div id="menu_button">
        <ul>
            <li><a href="?">Add [+]</a></li>
            <li><a href="#">Download [v]</a></li>
        </ul>
        <input type="button" onclick="onMenuClicked()" value="hide" />
    </div>

    <div id="big_menu" class="sidebar">
        <!--
        <input type="button" onclick="hideSidebar()" value="hide" />
        -->
        <ul>
        <?php
        foreach ($pdf_files as $id => $filename) {
            $class = ($id % 2 == 0) ? "odd" : "even";
            echo "<li class=\"$class\"><a href=\"?pdf=$filename\">$filename</a></li>\n";
        }
        ?>
        </ul>
    </div>
</body>
</html>
