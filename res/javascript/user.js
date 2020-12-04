
   var root="http://localhost/PHP/CMS/"; 

    /*LOGIN*/
   $(document).ready(function(){
    $(".btnUserLogin").on("click",function(){
        var email=$(".txtEmailUserLogin").val().trim();
        var pass=$(".txtPassUserLogin").val().trim();
        
        $.ajax({
            type:"POST",
            async: false,
            url: root +"res/php/user_actions/login.php",
            data:{ email:email,pass:pass},
            success:function(data)
            {   
                
                if(data){
                   alert("contraseña correcta"); 
                  window.location.href="http://localhost/PHP/CMS";
                    
                    
                }else{
                  alert("introduce bien los datos");
                }
            }
        });
        
        
        });
       /*favorito*/
       
    $(document).ready(function(){
        $(".btnMarkFavorite").on("click",function(e){
            var self=this;
           var post_id= $(this).attr("data-postId");
            e.preventDefault();
            $(self).removeClass("far fa-star");
            $(self).removeClass("btnMarkFavorite");
            $(self).addClass("fas fa-star");
            
            $.ajax({
            type:"POST",
            
            url: root +"res/php/user_actions/favorite.php",
            data:{ posts_id:post_id},
            success:function(data)
            {
                if(data){
                    
                    alert("Agregado a favorito");
                    
                }else{
                    alert("error");
                }
                
            },
                error:function(){
                   
                    
                    alert("error");
                }
        });
            
            
        });
       
        
        
        
        
        
        
    });
       /*ELIMINAR FAVORITO*/
     $(document).ready(function(){
        $(".btnDeleteFav").on("click",function(){
            
           var favorite_id= $(this).attr("data-favoriteID");
           
           
            
            $.ajax({
            type:"POST",
            
            url: root +"res/php/user_actions/deletefavorite.php",
            data:{ favorite_id:favorite_id},
            success:function(data)
            {console.log(data);
                if(data){
                    
                    alert("Eliminado de favorito");
                    
                }else{
                    alert("error");
                }
                
            },
                error:function(){
                   
                    
                    alert("error");
                }
        });
            
            
        });
       
        
        
        
        
        
        
    });
    
    
    /*REGISTER*/
     $(document).ready(function(){
    $(".btnUserRegister").on("click",function(){
       
        var name=$(".txtNameRegister").val().trim();
        var last=$(".txtLastNameRegister").val().trim();
        var user=$(".txtUsernameRegister").val().trim();
        var email=$(".txtEmailRegister").val().trim();
        var pass=$(".txtPassRegister").val().trim();
        var self=this;
        
        if( name !== "" && last !== "" && user !== "" && email !== "" && pass !== "" ){
           
            $.ajax({
            type:"POST",
            url: root +"res/php/user_actions/register.php",
            data:{ name:name,last_name:last,username:user,email:email,pass:pass},
                
                beforeSend:function(){
                    $(self).addClass("loading");
                },
               success:function(data){
                    $(self).removeClass("loading");
                   
                   if(data){
                       $(".txtNameRegister",".txtLastNameRegister",".txtUsernameRegister",".txtEmailRegister",".txtPassRegister").val(" ");
                       
                       alert("registado, ya puede iniciar session");
                   }else{
                       alert("error");
                       
                   }
               },
                error:function(){
                    $(self).removeClass("loading");
                    
                    alert("error");
                }
        
        });
           
           }else{
            alert("requiere llenar todos los campos");
           }
        
    });
    
    
});});