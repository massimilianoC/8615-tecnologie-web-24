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
            <?php if($notification['read'] > 0) echo 'read' ?>  
            <?php echo (($notification['fkPost']!= NULL)? 'list-group-item-info' : 'list-group-item-warning') ?>" 
            role="alert">
              <?php if($notification['fkUser']!= NULL) : ?>
                <?php $follower = $dbh->getUserByUserId($notification['fkUser']);?>
                <i class="bi bi-person-add"></i><span><a href="#"><strong><?php echo $follower['Nome'].' '.$follower['Cognome']  ?></strong></a> ha iniziato a seguirti</span>
              <?php else : ?>
                <?php $user = $dbh->getUserByPostId($notification['fkPost']);?>
                <i class="bi bi-file-post"></i><span><a href="#"><strong><?php echo $follower['Nome'].' '.$follower['Cognome']  ?></strong></a> ha pubblicato un post</span>
              <?php endif; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </li>
          </ul>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>