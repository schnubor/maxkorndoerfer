<?php
    require( TEMPLATE_DIR . 'renderSlide.php' );
    $uri = rtrim( dirname($_SERVER["SCRIPT_NAME"]), '/' );
    $uri = '/' . trim( str_replace( $uri, '', $_SERVER['REQUEST_URI'] ), '/' );
    $uri = urldecode( $uri );
    $projectId = substr($uri, strrpos($uri, '/') + 1);
    $query = new \Contentful\Delivery\Query();
    $query->setContentType('project');

    try {
        $project = $contentfulClient->getEntry( $projectId );
        $allProjects = $contentfulClient->getEntries($query);
    } catch (\Contentful\Core\Exception\NotFoundException $exception) {
        debug_to_console( 'Contentful error: ' . $exception );
    }

    $renderer = new \Contentful\RichText\Renderer();
?>

<!DOCTYPE html>
<html lang="en">
<?php renderHead( $project->title, $project->seoDescription ) ?>
<body>

    <section>
        <div class="container">
            <h1 class="title"><?php echo $project->title ?></h2>

            <?php echo nl2br($renderer->render($project->description)) ?>

            <?php
                foreach( $project->images as $asset ) {
                    echo '<div><img src="' . $asset->getFile()->getUrl() .'" /></div>';
                }
            ?>
        </div>
    </section>

</body>
</html>