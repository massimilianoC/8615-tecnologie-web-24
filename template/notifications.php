<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Notifiche</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php foreach($template_data["notifications"] as $notification) : ?>
          <ul class="list-group">
              <?php if($notification['fkFollow']!= NULL): ?>
                <?php $follower = $dbh->getFollowerByFollowId($notification['fkFollow']);?>
                <li class="list-group-item alert alert-warning alert-dismissible fade show <?php if($notification['read'] > 0) echo ' read ' ; echo 'list-group-item-warning ' ?>" >
                  <span><i class="bi bi-person-add"></i> <a href="index.php?page=userprofile&iduser=<?php echo $follower['idUSER']?>"><strong><?php echo $follower['nome'].' '.$follower['cognome']  ?></strong></a> ha iniziato a seguirti</span>
              <?php elseif($notification['fkPost']!= NULL): ?>
                <?php $post = $dbh->getPostByPostId($notification['fkPost']);?>
                <?php $user = $dbh->getUserByPostId($notification['fkPost']);?>
                <li class="list-group-item alert alert-warning alert-dismissible fade show <?php if($notification['read'] > 0) echo ' read' ; echo ($post['isComment']==0)? ' list-group-item-info ' : ' list-group-item-primary ' ?>" >
                  <?php if($post['isComment']==0): ?>
                    <span><i class="bi bi-file-post"></i><a href="index.php?page=userprofile&iduser=<?php echo $user['idUSER']?>"><strong><?php echo $user['nome'].' '.$user['cognome'] ?></strong></a> ha pubblicato un <a href="index.php#<?php echo $post['fkParent'] ?>?page=home">post</a></span>
                  <?php else: ?>
                    <span><i class="bi bi-chat-dots-fill"></i> 
                    <a href="index.php?page=userprofile&iduser=<?php echo $user['idUSER']?>"><strong><?php echo $user['nome'].' '.$user['cognome']  ?></strong><?php $parent = $dbh->getPostByPostId($post['fkParent']);?></a>
                     ha commentato un <a href="index.php#post<?php echo $post['fkParent'] ?>?page=home"><?php if($parent["fkUser"]==$_SESSION["user"]['idUSER']) echo 'tuo post'; else echo 'post di '.$dbh->getUserByUserId($parent["fkUser"])['nome'] ?></a></span>
                  <?php endif; ?>
                <?php endif; ?>
                <button id="<?php echo $notification['idNOTIFICATION'] ?>" type="button" class="archive notification btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </li>
          </ul>
        <?php endforeach; ?>
        <?php if(count($template_data["notifications"])==0): ?>
          <ul class="list-group">
          <li class="list-group-item alert alert-warning alert-dismissible fade show">
            Nessuna nuova notifica da mostrare
          </li> 
        <?php endif;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>