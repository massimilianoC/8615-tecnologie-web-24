<?php if(isset($_SESSION["alert"])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" >
                <?php echo $_SESSION["alert"]; 
                $_SESSION["alert"]=null; 
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php endif; ?>