<?php
$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);

$projectSlug = substr($uri, strrpos($uri, '/') + 1);

$query = new \Contentful\Delivery\Query();
$query->setContentType('project');

if(!isset($projects)) {
    $query = new \Contentful\Delivery\Query();
    $query->setContentType('project');
    try {
        $projects = $contentfulClient->getEntries($query);
    } catch (\Contentful\Core\Exception\NotFoundException $exception) {
        debug_to_console('Contentful error: ' . $exception);
    }
}

$project = null;

foreach( $projects as $contentfulProject ) {
    if ($projectSlug == $contentfulProject->slug) {
        $project = $contentfulProject;
        break;
    }
}

$renderer = new \Contentful\RichText\Renderer();
?>

<!DOCTYPE html>
<html lang="en">
<?php renderHead($project->title . ' | Max Korndoerfer', $project->seoDescription, false, $project->images[0]->getFile()->getUrl()) ?>

<body>
    <div class="project">
        <div class="row">
            <div class="col-md-2">
                <a href="/" class="back">&larr; back</a>
                <h1 class="title"><?php echo $project->title ?></h1>
                <div class="description">
                    <?php echo nl2br($renderer->render($project->description)) ?>
                </div>
            </div>

            <div class="col-md-8">
                <?php
                foreach ($project->images as $asset) {
                    echo '<div class="image">';
                    echo '<img src="' . $asset->getFile()->getUrl() . '" />';
                    if ($asset->getDescription()) {
                        echo '<p class="caption">' . $asset->getDescription() . PHP_EOL . '</p>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>