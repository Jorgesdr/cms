<link rel="stylesheet" href="../../CMS/res/css/main.css">

<form encyte="multipar/form-data" id="new_posts_container" class="ui form new_posts_container">

    <h1>Nueva publicación</h1>
    
    <p><b>Nombre de la publicación</b></p>
    <div class="ui input">
        <input type="text" class="txtNamePost" id="txtNamePost" name="txtNamePost" placeholder="Nombre de la Publicacion">
    </div>
    
    <p><b>Categoria</b></p>
    <div class="field">
        <select class="txtCategoryPost" name="txtCategoryPost">
          <option value="0">SELECCIONAR CATEGORIA</option>
          <?php foreach($categories as $category):?>
            <option value="<?php echo($category['category_id']);?>"><?php echo($category['category']);?></option>
            <?php endforeach;?>
        </select>
    </div>
    
    <p><b>Seleccione una imagen</b></p>
    <div class="ui input">
        <input type="file" class="img_file" name="img_file">
    </div>
    
    <p><b>Publicación</b></p>
   
        <textarea id="txtDescription" class="txtDescription"></textarea>
    
    <button class="ui button blue btnSavePost">Publicar</button>

</form>
