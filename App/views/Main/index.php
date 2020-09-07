<h1>the index from MAIN view</h1>

<p><?php echo "movie is: " .$movie;?></p>
<p><?php echo "watch: " .$episode;?></p>

<?php if(!empty($posts)): ?>
<?php foreach($posts as $pst): ?>
    <H3 style="color:red;"><?php echo $pst['title']?></H3>
    <p style="border:1px solid green;"><?php echo $pst['short_content']?></p>
    <p><?php echo $pst['date']?></p>
<?php endforeach; ?>
<?php endif;?>