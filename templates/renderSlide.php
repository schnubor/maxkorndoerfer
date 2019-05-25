<?php
    function renderSlide($project) {
        echo '<div class="slide">';
        echo '<a href="/project/' . $project->getId() . '">';
        echo '<div>';
        echo '<img class="preview" src="' . $project->pictures[0]->getFile()->getUrl() . '">';
        echo '</div>';
        echo '</a>';
        echo '<p class="subtitle">' . $project->headline . '</p>';
        echo '</div>';
    }
?>