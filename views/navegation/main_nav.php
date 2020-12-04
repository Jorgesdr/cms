<div class="ui secondary pointing menu" style="margin-bottom: 0px;">
  <a class="active item">
    Inicio
  </a>
  <a href="http://localhost/PHP/CMS/"class="item">
    Publicaciones
  </a>
  <?php if(isset($_SESSION["user"])):?>
    <a href="http://localhost/PHP/CMS/favorites"class="item">
    Publicaciones favoritas
  </a>
    <?php endif;?> 
  <?php if(!isset($_SESSION["user"])):?>
  <div  class="right menu">
    <a href="http://localhost/PHP/CMS/login" class="ui item">
      Iniciar Sesion
    </a>
      <a href="http://localhost/PHP/CMS/register" class="ui item">
      Registro
    </a>
  </div>
    <?php else: ?>
     <div  class="right menu">
    
      <a href="http://localhost/PHP/CMS/logout" class="ui item">
      Log out
    </a>
  </div>
    
    <?php endif;?>
</div>

