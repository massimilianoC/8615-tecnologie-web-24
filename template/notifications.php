<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Notifiche</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- $_SESSION['template']["notifications"] -->
        <?php foreach($_SESSION['template']["notifications"] as $post) : ?>
          <ul class="list-group">
            <li class="list-group-item">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Holy guacamole!</strong> You should check in on some of those fields below.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
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