<div>
  <div class="login-box">

    <div class="login-logo">

      <img src="vistas/img/plantilla/logo-torneos.png" class="img-responsive"
      style="padding:30px 100px 0px 100px">

    </div>


    <div class="login-box-body">

      <p class="login-box-msg">Ingresar al sistema</p>

      <form method="post">

        <div class="form-group has-feedback">

          <input type="text" class="form-control" placeholder="Email" name="ingresoEmail">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>

        </div>

        <div class="form-group has-feedback">

          <input type="password" class="form-control" placeholder="Password" name="ingresoPassword">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        </div>

        <div class="row">


          <div class="col-xs-4">

            <button type="submit" name="botonIngreso" class="btn btn-primary btn-block btn-flat" value="boton-ingreso">Ingresar</button>
            <button type="submit" name="botonRegistro" class="btn btn-primary btn-block btn-flat" value="boton-registro">Registrarse</button>

          </div>

        </div>

        <?php
          $login = new ControladorPersona();
          $login -> ctrIngresoPersona();
        ?>

      </form>

    </div>

  </div>
</div>