<h1>the index from MAIN view</h1>
<div class="wrapper_test">
<?php foreach($cat as $c): ?>
    <p><a href="/page/<?= $c['cat_name']?>"><?php echo $c['cat_name']?></a></p>
<?php endforeach; ?>
</div>

<p><?php echo "movie is: " .$movie;?></p>
<p><?php echo "watch: " .$episode;?></p>

<?php if(!empty($posts)): ?>
<?php foreach($posts as $pst): ?>
    <H3 class="top_blck" style="color:#FFF;"><?php echo $pst['title']?></H3>
    <p class="base_blck"><?php echo $pst['short_content']?></p>
    <p><?php echo $pst['date']?></p>
    <p><a href="/posts/<?= $pst['id']?>">see more...</a></p>
    
<?php endforeach; ?>
<?php endif;?>