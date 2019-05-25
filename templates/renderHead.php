<?php
    function renderHead($title, $description, $noindex = false)
    {
        require_once(TEMPLATE_DIR . '/head.php');

        echo "\t<title>" . $title . "</title>";
        echo "\t<meta name=\"description\" content=\"" . $description . "\">\n";
        echo "\t<link rel=\"canonical\" href=\"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\">\n";
        echo "\t<meta property=\"og:url\" content=\"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\">\n";
        echo "\t<meta property=\"og:type\" content=\"website\">\n";
        echo "\t<meta property=\"og:title\" content=\"" . $title . "\">\n";
        echo "\t<meta property=\"og:image\" content=\"http://{$_SERVER['HTTP_HOST']}/assets/images/ogimage.jpg\">\n";
        echo "\t<meta property=\"og:description\" content=\"" . $description . "\">\n";
        echo "\t<meta property=\"og:site_name\" content=\"Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich\">\n";
        echo $noindex ? "\t<meta name=\"robots\" content=\"noindex,nofollow\">\n" : '';
        echo "</head>";
    }
?>
