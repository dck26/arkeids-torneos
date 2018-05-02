<div>
  <div class="login-box">

    <div class="login-logo">

      <img src="vistas/img/plantilla/logo-torneos.png" class="img-responsive"
      style="padding:30px 100px 0px 100px">

    </div>


    <div class="login-box-body">

      <p class="login-box-msg">Registro</p>

      <form method="post" enctype="multipart/form-data">

        <div class="form-group has-feedback">

          <input type="text" class="form-control" placeholder="Nombre" name="registroNombre" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>

        </div>

        <div class="form-group has-feedback">

          <input type="text" class="form-control" placeholder="Nickname o alias" name="registroApodo" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>

        </div>

        <div class="form-group has-feedback">

          <input type="email" class="form-control" placeholder="Email" name="registroEmail" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        </div>

        <div class="form-group has-feedback">

          <input type="password" class="form-control" placeholder="Password" name="registroPassword" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        </div>

        <div class="form-group has-feedback">

          <input type="password" class="form-control" placeholder="Repite tu password" name="registroPasswordRepite" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        </div>  

        <div class="form-group">
               <div class="panel">

                <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 4 MB</p>
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

               </div>

        <div class="row">


          <div class="col-xs-6">

            <a class="btn btn-default btn-block btn-flat" href="login">Cancelar</a>

          </div>
          <div class="col-xs-6">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Confirmar</button>
          </div>

          </div>

        </div>

        <?php
          $login = new ControladorPersona();
          $login -> ctrRegistroPersona();
        ?>

      </form>

    </div>

  </div>
</div>