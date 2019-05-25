<?php
try {
    $entry = $contentfulClient->getEntry('6y2Rqqc1EoESjo6WrXjOQe');
} catch (\Contentful\Core\Exception\NotFoundException $exception) {
    debug_to_console('Contentful error: ' . $exception);
}

$renderer = new \Contentful\RichText\Renderer();
?>

<!DOCTYPE html>
<html lang="en">
    <?php renderHead( 'Datenschutz | Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich', 'Architekturbüro zur Sanierung und Planung im denkmalgeschützten Bereich', true ) ?>

    <body>
        <?php include( TEMPLATE_DIR . '/navigation.php') ?>

        <section>
            <div class="container legal">
                <h2 class="title"><?php echo $entry->title ?></h2>
                <?php echo nl2br($renderer->render($entry->content)) ?>
            </div>
        </section>

        <?php include( TEMPLATE_DIR . '/footer.php') ?>
    </body>
</html>