<?php
    function renderHead($title, $description, $noindex = false, $ogImage = "/assets/images/ogimage.jpg")
    {
        require_once(TEMPLATE_DIR . '/head.php');

        if($ogImage === '/assets/images/ogimage.jpg'){
            $ogImage = "http://{$_SERVER['HTTP_HOST']}/assets/images/ogimage.jpg";
        }

        echo "\t<title>" . $title . "</title>";
        echo "\t<meta name=\"description\" content=\"" . $description . "\">\n";
        echo "\t<link rel=\"canonical\" href=\"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\">\n";
        echo "\t<meta property=\"og:url\" content=\"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\">\n";
        echo "\t<meta property=\"og:type\" content=\"website\">\n";
        echo "\t<meta property=\"og:title\" content=\"" . $title . "\">\n";
        echo "\t<meta property=\"og:image\" content=\"" . $ogImage . "\">\n";
        echo "\t<meta property=\"og:description\" content=\"" . $description . "\">\n";
        echo "\t<meta property=\"og:site_name\" content=\"Max Korndörfer | Freischaffender Fotograf Berlin\">\n";
        echo $noindex ? "\t<meta name=\"robots\" content=\"noindex,nofollow\">\n" : '';
        echo "</head>";
    }
?>
