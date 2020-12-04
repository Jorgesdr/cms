<div class="background_main">
    <div class="overlay"></div>
<h1 class="main_title">Prueba blog</h1>

</div>

<div class="ui grid stackable container" style="margin-top: 25px;">
    <div class="sixtenn wide column">
        <h2>Publicaciones Favoritas</h2>
     </div>   
    
    <?php 
    
    foreach($posts as $post):
    ?>
    <a href="post/<?php echo $post['posts_id'];?>" class="four wide column ">
        <div class="post_container">
        <img class="post_img" src="res/img/imgpost/<?php echo $post['img_post'];?>.jpeg" alt="<?php echo $post['name'];?>">
        <h2 class="post_title">
        <?php echo $post['name'];?>
        </h2>
        <p class="post_date"><?php echo date("d-m-Y",$post["created_post"]);?></p>
        <p class="ui red button btnDeleteFav" data-favoriteID="<?php echo $post['favorite_id'];?>">Eliminar</p>
        </div>   
    </a>
    <?php endforeach;?>
    
</div>
