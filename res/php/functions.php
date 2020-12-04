
<?php 


require("init.php");


class User_Actions{
    
    
    
    public function getfavorites($users_id){
        global $database;
        
        $posts=$database->select("favorites",["[>]posts"=>["post_id"=>"posts_id"]],["posts.posts_id","posts.name","posts.img_post","posts.created_post","favorites.favorite_id"],["favorites.user_id"=>$users_id,"ORDER"=>["favorites.favorite_id"=>"DESC"]]);
        
        return $posts;
        
    }
    public function checkfavorite($userid,$postid){
         global $database;
        $user=$database->count("favorites",["AND"=>["user_id"=>$userid,"post_id"=>$postid]]);
        
        return($user);
        
    }
    /*Delete favorite*/
    public function deletefavorite($favorite_id){
        global $database;
        $delete=$database->delete("favorites",["favorite_id"=>$favorite_id]);
        return $delete->rowCount();
            
        
    }
    
    
    
    public function favorite($postid,$userid){
        global $database;
        
         if($this->checkexistance($userid,$postid)==0){$database->insert("favorites",["user_id"=>$userid,"post_id"=>$postid]);
        
        return true;
    }else{
           return false;  
         }
        
    }
    
    
    /*Recuperamos en perfil*/
    public function getprofile($session){
        global $database;
        
        
        $profile=$database->select("users",["users_id"],["OR" =>["username"=>$session,"email"=>$session]
                                                    
    ]);
        return($profile);
        
    }
    
    
    /* login*/
    public function login($user_email,$pass){
        global $database;
        
        //$login=$database->select("users",["pass"],["OR" =>["username"=>$user_email,"email"=>$user_email]]);
        
         $data=$database->select("users",["pass"],["OR" =>["username"=>$user_email,"email"=>$user_email]
                                                    
    ]);
        
        $password_db=$data[0]["pass"];

        if(password_verify($pass,$password_db)){
            
        
        return true;
          
        }else{
            
            return false;
        }
    }
    
    /*COmprobamos que no existe el usuarui y email*/
    
    public function checkexistance($user,$email){
         global $database;
        $user=$database->count("users",["OR"=>["username"=>$user,"email"=>$email]]);
        
        return($user);
        
    }
    
    /*register*/
    public function register($name,$last,$user,$email,$pass){
        global $database;
        
        if($this->checkexistance($user,$email)==0){
             $register=$database->insert("users",["pass"=>password_hash($pass,PASSWORD_DEFAULT),"username"=>htmlentities($user),"email"=>htmlentities($email),"name"=>htmlentities($name),"last_name"=>htmlentities($last),"created"=>time()]);
              
           
           
            return true;
        }else{
            
            return false;
        }
        
        
        
       
        
    }
    /*end register*/
    
    
    
    /*GEt recent post*/
    public function getrecentpost(){
    global $database;
        
        $posts=$database->select("posts",["posts_id","name","img_post","created_post"],["ORDER"=>["posts.posts_id"=>"DESC"],"LIMIT"=>"8"]);
        
        return $posts;
    }
    
    /*GEt info post*/
    public function getpostinfo($posts_id){
        global $database;
        
        $posts=$database->select("posts",["[>]categories"=>["category_id"=>"category_id"] ,"[>]admin"=>["admin_id"=>"admin_id"] ],["posts.name","posts.body","posts.img_post","posts.created_post","categories.category","admin.username"],["posts_id"=>$posts_id]);
        
        return $posts;
    }
     
    
    
    
}

class Admin_Actions{
    
    /*login admin*/
    public function login($user_email,$pass){
        global $database;
        
        $data=$database->select("admin",["password"],["OR" =>["username"=>$user_email,"email"=>$user_email]
                                                    
    ]);
        
        $password_db=$data[0]["password"];

        if(password_verify($pass,$password_db)){
            
        return true;
        }else{
            return false;
        }
    }
    /*end login admin*/
    
    
    public function savecategory($category){
        global $database;
        $database->insert("categories",["category"=>htmlentities($category)]);
        return $database->id();
            
        
    }
    
    public function getcategory(){
        global $database;
        $categories=$database->select("categories",["category_id","category"]);
        return $categories;
            
        
    }
    
    public function deletecategory($category_id){
        global $database;
        $delete=$database->delete("categories",["category_id"=>$category_id]);
        return $delete->rowCount();
            
        
    }
    
    public function savepost($name,$category_id,$description,$nameimg,$admin_id){
        global $database;
        $database->insert("posts",["name"=>htmlentities($name),"body"=>$description,"category_id"=>htmlentities($category_id),"created_post"=>time(),"img_post"=>$nameimg,"admin_id"=>htmlentities($admin_id)]);
        
        return $database->id();
    }
    
     public function getprofile($email){
        global $database;
        $admin=$database->select("admin",["admin_id","username"],["email"=>$email]);
        
            
        return($admin);
    }
    
    
}



?>