<?php print_r($this->found); ?>

<h2>Results</h2>
<!-- //TODO: list items not paragraphs -->
<?php foreach ($found as $post) { ?>
    <div class="result-row">
        <a hre="#"><?php echo $post->title; ?></a>
        <p>
            <?php echo strip_tags(substr($post->post, 0, 200)); ?>
        </p>
    </div>
<?php } ?>