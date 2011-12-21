<!-- //TODO: every css code to a proper css file -->
<div>
    <?php foreach($this->posts as  $post) { ?>
        <h2 style="background-color:green;width:100%;"><?php echo $post->title; ?></h2>
        <div>
            <div style="float:left;width:25%;height:175px;background-color:lightgreen;text-align:center;">
                <div style="border:2px solid black;width:50%;height:80%;margin:12px 25% 0 25%"></div>
                <div style=""><?php $post->username; ?></div>
            </div>
            <div style="float:right;width:75%;height:175px;background-color:lightgoldenrodyellow;">
                <?php $post->post; ?>
            </div>
            <div style="clear:both;"></div>
        </div>
    <?php } ?>
</div>
<div id="reply" style="text-align:center;">
    <form action="#" method="POST">
        <textarea style="width:750px;height:250px;border:1px solid black;" id="reply"></textarea>
        <input type="submit" value="SUBMIT" style="border:1px solid black;" />
        <input type="hidden" name="threadID" value="" />
        <input type="hidden" name="userID" value="" />
    </form>
</div>