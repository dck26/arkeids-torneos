<div id="back">
  <div class="login-box">

    <div class="login-logo">

      <img src="vistas/img/plantilla/logo-torneos.png" class="img-responsive"
      style="padding:30px 100px 0px 100px">

    </div>


    <div class="login-box-body">

      <p class="login-box-msg">Ingresar al sistema</p>

      <form method="post">

        <div class="form-group has-feedback">

          <input type="text" class="form-control" placeholder="Usuario" name="ingresoUsuario" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>

        </div>

        <div class="form-group has-feedback">

          <input type="password" class="form-control" placeholder="Password" name="ingresoPassword" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        </div>

        <div class="row">


          <div class="col-xs-4">

            <button type="submit" name="ingresar" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            <button type="submit" name="registrarse" class="btn btn-primary btn-block btn-flat">Registrarse</button>

          </div>

        </div>

        <?php
          $login = new ControladorUsuarios();
          $login -> ctrIngresoUsuario();
        ?>

      </form>

    </div>

  </div>
</div>