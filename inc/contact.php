<?php
    try {
        $entry = $contentfulClient->getEntry('3wPOtFWgrYK1xoZcMIJYyt');
    } catch (\Contentful\Core\Exception\NotFoundException $exception) {
        debug_to_console( 'Contentful error: ' . $exception );
    }

    $renderer = new \Contentful\RichText\Renderer();
?>

<!DOCTYPE html>
<html lang="en">
    <?php renderHead( 'Kontakt | Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich', 'Architekturbüro zur Sanierung und Planung im denkmalgeschützten Bereich' ) ?>

    <body>
        <?php include( TEMPLATE_DIR . '/navigation.php') ?>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php echo nl2br($renderer->render($entry->kontaktdaten)) ?>

                        <ul>
                            <li>
                                <span class="option">Mail</span>
                                <a href="mailto:<?php echo $entry->email; ?>">
                                    <?php echo $entry->email; ?>
                                </a>
                            </li>
                            <li>
                                <span class="option">Fon</span>
                                <a href="tel:<?php echo $entry->telefon; ?>">
                                    <?php echo $entry->telefon; ?>
                                </a>
                            </li>
                            <li class="last">
                                <span class="option">Fax</span>
                                <a href="tel:<?php echo $entry->fax; ?>">
                                    <?php echo $entry->fax; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2428.993348912822!2d13.317601416468753!3d52.497359979810085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a850f06b2cba6b%3A0xe10cc71d9a4c429d!2sS%C3%84UM+Architekten!5e0!3m2!1sen!2sde!4v1551910200288" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>

        <?php include( TEMPLATE_DIR . '/footer.php') ?>
    </body>
</html>