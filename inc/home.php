<?php
require(TEMPLATE_DIR . 'renderProject.php');
$query = new \Contentful\Delivery\Query();
$query->setContentType('project');
try {
    $projects = $contentfulClient->getEntries($query);
} catch (\Contentful\Core\Exception\NotFoundException $exception) {
    debug_to_console('Contentful error: ' . $exception);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php renderHead('Max Korndörfer', 'Freischaffender Fotograf Berlin') ?>

<body>
    <div class="home">
        <h1 class="title">Max Korndörfer</h1>

        <ul class="navigation">
            <?php foreach ($projects as $project) { ?>
                <li class="navItem">
                    <a href="/project/<?php echo $project->getId() ?>">
                        <?php echo $project->title ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</body>

</html>