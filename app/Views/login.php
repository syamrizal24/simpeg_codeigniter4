<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Sistem</title>

    <!-- Bootstrap -->
    <link href="<?= base_url("assets/ans_template/"); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url("assets/ans_template/"); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url("assets/ans_template/"); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url("assets/ans_template/"); ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url("assets/ans_template/"); ?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
						
      <div class="login_wrapper">
	  					
        <div class="animate form login_form">
		
		  
          <section class="login_content">
            <form action="<?php echo base_url('login'); ?>" method="post" class="form-signin">
              <h3>Login Sistem</h3>
			  
			  	
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
              </div>
              <div>
                <input type="submit" class="btn btn-primary submit" value="Log In" style="margin:0px">
              </div>
						
              <div class="clearfix"></div>
			  
			  <div>
			  <br>
				<?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
			  </div>
              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2020 All Rights Reserved.</p>
                </div>
              </div>
            </form>
			
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>



