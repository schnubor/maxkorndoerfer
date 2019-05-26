<?php
require(TEMPLATE_DIR . 'renderSlide.php');
$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);
$projectId = substr($uri, strrpos($uri, '/') + 1);
$query = new \Contentful\Delivery\Query();
$query->setContentType('project');

try {
    $project = $contentfulClient->getEntry($projectId);
    $allProjects = $contentfulClient->getEntries($query);
} catch (\Contentful\Core\Exception\NotFoundException $exception) {
    debug_to_console('Contentful error: ' . $exception);
}

$renderer = new \Contentful\RichText\Renderer();
?>

<!DOCTYPE html>
<html lang="en">
<?php renderHead($project->title . ' | Max Korndoerfer', $project->seoDescription) ?>

<body>
    <div class="project">
        <div class="row">
            <div class="col-md-3">
                <a href="/" class="back">&larr; back</a>
                <h1 class="title"><?php echo $project->title ?></h1>
                <div class="description">
                    <?php echo nl2br($renderer->render($project->description)) ?>
                </div>
            </div>

            <div class="col-md-9">
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