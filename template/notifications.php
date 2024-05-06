<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Notifiche</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php foreach($_SESSION['template']["notifications"] as $notification) : ?>
          <ul class="list-group">
            <li class="list-group-item alert alert-warning alert-dismissible fade show 
            <?php if($notification['read'] > 0) echo ' read ' ?>  
            <?php echo (($notification['fkPost']!= NULL)? ' list-group-item-info ' : ' list-group-item-warning ') ?>"  role="alert">
              <?php if($notification['fkFollow']!= NULL): ?>
                <?php $follower = $dbh->getUserByUserId($notification['fkFollow']);?>
                <span><i class="bi bi-person-add"></i> <a href="index.php?page=userprofile&iduser=<?php echo $follower['idUSER']?>"><strong><?php echo $follower['nome'].' '.$follower['cognome']  ?></strong></a> ha iniziato a seguirti</span>
              <?php elseif($notification['fkPost']!= NULL): ?>
                <?php $user = $dbh->getUserByPostId($notification['fkPost']);?>
                <span><i class="bi bi-file-post"></i> <a href="index.php?page=userprofile&iduser=<?php echo $user['idUSER']?>"><strong><?php echo $user['nome'].' '.$user['cognome']  ?></strong></a> ha pubblicato un post</span>
              <?php endif; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </li>
          </ul>
        <?php endforeach; ?>
        <?php if(count($_SESSION['template']["notifications"])==0): ?>
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