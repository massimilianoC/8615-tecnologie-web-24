<?php if(isset($_SESSION["errorelogin"])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" >
                <?php echo $_SESSION["errorelogin"]; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php endif; ?>