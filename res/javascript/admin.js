

$(document).ready(function(){
    var root="http://localhost/PHP/CMS/";
    
     try{
    CKEDITOR.replace("txtDescription");
     }catch(e){
         
     }
        
    
    
    
   //login
   
    $(".btnAdminLogin").on("click",function(){
        var email=$(".txtEmailLogin").val().trim();
        var pass=$(".txtPassLogin").val().trim();
        
        $.ajax({
            type:"POST",
            async: false,
            url: root +"res/php/admin_actions/login.php",
            data:{ email:email,password:pass},
            dataType:'html' ,
            success:function(data){
                
                
                if(!data){
                 alert("introduce bieasdaasdan los datos");
                }else{
                alert("contraseña correcta"); window.location="http://localhost/PHP/CMS/admin/post";
                  
                }
        },error:function(){
            alert ("error");
        }
        });
    });
    
    
    
    /*CREAR CATEGORIA*/
    $(".btnSaveCategory").on("click",function(){
        var category=$(".txtNameCategory").val().trim();
        var self =this;
        
         $.ajax({
            type:"POST",
            url: root +"res/php/admin_actions/savecategory.php",
        data:{category:category},beforeSend:function(){
            $(self).addClass("loading");
        },
             success:function(data){
                 $(self).removeClass("loading");
                 if(data>0){
                     
                     $(".txtNameCategory").val("");
                     
                     $(".tblCategories tr:last").after("<tr><td>"+category+"</td><td><i class='fa fa-remove btnRemoveCategory' data-categoryid='"+data+"' style='color: red; cursor: pointer;' title='Eliminar Categoria'></i></td></tr>")
                 }else{
                     alert("error");
                 }
             },error:function(){
                 alert("error");
             }
         });
    });
    
    $(".tblCategories").on("click",".btnRemoveCategory",function(){
        var category_id=$(this).attr("data-categoryid");
        var self=this;
        $.ajax({
            type:"POST",
            url: root +"res/php/admin_actions/deletecategory.php",
        data:{category_id:category_id},
             success:function(data){
                 
                 if(data>0){                
                 $(self).parent().parent().remove();
                     alert("eliminado");
                 }else{
                     alert("error");
                 }
                 
             },error:function(){
                 alert("error");
             }
         });
        
    });
    
    $(".btnSavePost").on("click",function(e){
        e.preventDefault();
        var description=CKEDITOR.instances.txtDescription.getData();
        var name=$(".txtNamePost").val().trim();
        var category_id=$(".txtCategoryPost").val().trim();
        if(description!==""&&name!==""&&category_id>0){
           //ajax para subir publicacion
            var formdata=new FormData($("#new_posts_container")[0]);
            formdata.append("description",description);
            $.ajax({
                xhr:function(){
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress",function(evt){
                       if(evt.lengthComputable){
                           var percentComplete=evt.loaded/evt.total;
                           
                           percentComplete=parseInt(percentComplete*100);
                           
                           
                       } 
                    },false);
                    return xhr;
                },
                type:"POST",
            url: root +"res/php/admin_actions/newpost.php",
            data:formdata,
                processData:false,
                contentType:false,
                beforeSend:function(){
                    //nada
                },
                success:function(){
                    $(".txtNamePost","img_file","txtDescription").val("");
                    $(".txtCategoryPost").val("0");
                    //CKEDITOR.instances["txtDescription"].setData("");
                  alert("nuevo post enviado")  ;
                },
                error:function(){
                    alert("error");
                }
            
            
            });
            
           }else{
               alert("llenene todo");
           }
    });
    
    
    
});