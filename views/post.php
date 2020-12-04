
<div class="post_main_img">
    <img  src="../res/img/imgpost/<?php echo $posts[0]['img_post'];?>.jpeg" alt="<?php echo $posts[0]['name'];?>">
 </div>
<div class="post_main_body">
    <h2>
        <?php echo $posts[0]['name'];?>
        <?php if(isset($_SESSION["user"])&& $check<1):?>
        
        <span    style="float: right;" title="Marcar favorito">
            <i class="far fa-star btnMarkFavorite" data-postId="<?php echo $_GET["posts_id"]?>" style="color: red;cursor: pointer;float: right;">
            </i>
        </span>
        <?php else:?>
        <span    style="float: right;" title="Marcar favorito">
            <i class="fas fa-star" data-postId="<?php echo $_GET["posts_id"]?>" style="color: red;cursor: pointer;float: right;">
            </i>
        </span>        
        <?php endif;?>
    
    </h2>
    <p class="post_date">
        <?php echo date("d-m-Y",$posts[0]["created_post"]);?>
        </p>
    <p>Escrito por : <?php echo $posts[0]['username'];?> </p>
    <p>
        <?php echo $posts[0]['body'];?>
    </p>
    

</div>