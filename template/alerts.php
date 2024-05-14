<?php if(isset($template_data["errorelogin"])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" >
                <?php echo $template_data["errorelogin"]; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php endif; ?>