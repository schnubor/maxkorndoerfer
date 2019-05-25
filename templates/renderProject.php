<?php
    function renderProject($project) {
        echo '<div class="col-md-4 tight">';
        echo '<a href="/project/' . $project->getId() . '">';
        echo '<div class="project">';
        echo '<img class="preview" src="' . $project->pictures[0]->getFile()->getUrl() . '">';
        echo '<div class="project-overlay">' . $project->headline . '</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
?>