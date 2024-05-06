<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function getUsers(){
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserByUserId($id){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE idUSER = ? ");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    public function getUserByPostId($id){
        $query = "SELECT u.* FROM users u, posts p WHERE p.idPOST=? and p.fkUser=u.idUSER";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    public function getPosts($n=-1){
        $query = "SELECT * FROM posts ORDER BY dataInserimento DESC";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostsByUserId($id){
        $query = "SELECT * FROM posts WHERE  isComment = 0 AND fkUser=? ORDER BY dataInserimento DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }



    public function getFollowerByUserId($id){
        $query = "SELECT u.* FROM users u, followers f WHERE f.fkFollowed=? and f.fkFollower=u.idUSER";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFollowedByUserId($id){
        $query = "SELECT u.* FROM users u, followers f WHERE f.fkFollower=? and f.fkFollowed=u.idUSER";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostsVisibleToUserId($id){
        $query = "SELECT *
        FROM posts
        WHERE isComment = 0 AND (fkUser = ? 
        or fkUser in (SELECT fkFollowed 
                        FROM tecnologieweb2024.followers as f
                        WHERE fkFollower = ? and isAccepted = 1))
        order by dataInserimento DESC ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id,$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCommentsByPostId($id){    
        $query = "SELECT *
        FROM posts
        WHERE isComment = 1 AND fkParent = ?
        order by dataInserimento";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getNotificationsByUserId($id){
        $query = "SELECT * FROM notifications WHERE fkUser=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertUser($nome, $cognome, $email, $password, $nickname="", $imageUrl="" ){
        if($nickname == ""){
            $nickname = $nome . randomNumbers();
        }
        $query = "INSERT INTO users
                (nome, cognome, email, password, nickname, imageUrl) VALUES( ?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss',$nome, $cognome, $email, $password, $nickname, $imageUrl );
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function insertPost($mediaUrl, $text, $isComment, $fkParent, $fkUser ){
        if($fkParent > 0){
            $query = "INSERT INTO posts (mediaUrl, text, isComment, fkParent, fkUser) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssiii',$mediaUrl, $text, $isComment, $fkParent, $fkUser);
        }else{
            $query = "INSERT INTO posts (mediaUrl, text, isComment, fkUser) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssii',$mediaUrl, $text, $isComment, $fkUser);
        }
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function insertFollower( $fkFollower, $fkFollowed , $isAccepted=1){
        $query = "INSERT INTO followers (fkFollower, fkFollowed , isAccepted) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii',$fkFollower, $fkFollowed, $isAccepted);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateFollower( $isAccepted, $fkFollower, $fkFollowed){
        $query = "UPDATE followers SET isAccepted = ? WHERE fkFollower = ? AND fkFollowed = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sii',$isAccepted, $fkFollower, $fkFollowed);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function insertNotification($fkUser, $fkPost, $fkFollow ){
        if($fkPost==0){
            $query = "INSERT INTO notifications (fkUser, fkFollow ) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii',$fkUser, $fkFollow);
        } else if($fkFollow==0){
            $query = "INSERT INTO notifications (fkUser, fkPost ) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii',$fkUser, $fkPost);  
        }
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function updateNotification( $dataVisualizzazione, $dataArchiviazione, $emailSent, $read, $idNOTIFICATION){
        $query = "UPDATE notifications SET dataVisualizzazione = ?, dataArchiviazione = ?, emailSent = ?, read = ? WHERE idNOTIFICATION = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssiii',$dataVisualizzazione, $dataArchiviazione, $emailSent, $read, $idNOTIFICATION);
        
        return $stmt->execute();
    }

    public function getUserByEmail($email){
        $query = "SELECT * FROM users WHERE (dataCancellazione is null) AND email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }    


   /* 
   public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoryById($idcategory){
        $stmt = $this->db->prepare("SELECT nomecategoria FROM categoria WHERE idcategoria=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPosts($n=-1){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore WHERE autore=idautore ORDER BY dataarticolo DESC";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($id){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, testoarticolo, dataarticolo, nome FROM articolo, autore WHERE idarticolo=? AND autore=idautore";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByCategory($idcategory){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore, articolo_ha_categoria WHERE categoria=? AND autore=idautore AND idarticolo=articolo";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByIdAndAuthor($id, $idauthor){
        $query = "SELECT idarticolo, anteprimaarticolo, titoloarticolo, imgarticolo, testoarticolo, dataarticolo, (SELECT GROUP_CONCAT(categoria) FROM articolo_ha_categoria WHERE articolo=idarticolo GROUP BY articolo) as categorie FROM articolo WHERE idarticolo=? AND autore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id, $idauthor);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByAuthorId($id){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo WHERE autore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertArticle($titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore){
        $query = "INSERT INTO articolo (titoloarticolo, testoarticolo, anteprimaarticolo, dataarticolo, imgarticolo, autore) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssi',$titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateArticleOfAuthor($idarticolo, $titoloarticolo, $testoarticolo, $anteprimaarticolo, $imgarticolo, $autore){
        $query = "UPDATE articolo SET titoloarticolo = ?, testoarticolo = ?, anteprimaarticolo = ?, imgarticolo = ? WHERE idarticolo = ? AND autore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssii',$titoloarticolo, $testoarticolo, $anteprimaarticolo, $imgarticolo, $idarticolo, $autore);
        
        return $stmt->execute();
    }

    public function deleteArticleOfAuthor($idarticolo, $autore){
        $query = "DELETE FROM articolo WHERE idarticolo = ? AND autore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idarticolo, $autore);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    public function insertCategoryOfArticle($articolo, $categoria){
        $query = "INSERT INTO articolo_ha_categoria (articolo, categoria) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$articolo, $categoria);
        return $stmt->execute();
    }

    public function deleteCategoryOfArticle($articolo, $categoria){
        $query = "DELETE FROM articolo_ha_categoria WHERE articolo = ? AND categoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$articolo, $categoria);
        return $stmt->execute();
    }

    public function deleteCategoriesOfArticle($articolo){
        $query = "DELETE FROM articolo_ha_categoria WHERE articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$articolo);
        return $stmt->execute();
    }

    public function getAuthors(){
        $query = "SELECT username, nome, GROUP_CONCAT(DISTINCT nomecategoria) as argomenti FROM categoria, articolo, autore, articolo_ha_categoria WHERE idarticolo=articolo AND categoria=idcategoria AND autore=idautore AND attivo=1 GROUP BY username, nome";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($username, $password){
        $query = "SELECT idautore, username, nome FROM autore WHERE attivo=1 AND username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }    
*/
}
