<link rel="stylesheet" href="../../CMS/res/css/main.css">

<div id="new_posts_container" class="ui form new_posts_container">

    <h1>Categorias</h1>
    
    <p><b>Nombre de la categoria</b></p>
    <div class="ui input">
        <input type="text" class="txtNameCategory" placeholder="Nombre de la categoria">
    </div>
    
    
    
    <button class="ui button blue btnSaveCategory">Crear Categoria</button>
    
    <h3>Categorias</h3>
    <table class="ui single line table tblCategories">
        <thead>
        <tr>
        <th>Nombre de la Categoria</th>
        <th>Acción </th>
        </thead>
        </tr>
        <tbody>
        <?php
            foreach($categories as $category):
            
            ?>
            <tr>
            <td><?php echo($category["category"])?></td>
                <td><i class="fa fa-remove btn btnRemoveCategory" data-categoryid="<?php echo($category['category_id']); ?>" style="color: red; cursor: pointer;" title="Eliminar Categoria"></i></td>
            
            </tr>
        <?php endforeach;
        ?>
        </tbody>
    
    </table>

</div>