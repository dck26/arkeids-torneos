  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Torneos
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Torneos</li>

      </ol>

    </section>

    <section class="content">

      <div class="box">

        <?php
        /**
         *
         * ACTIVA EL BOTÓN DE CREAR TORNEO PARA EL PERFIL ADMIN
         *
         */
        
        if($_SESSION["perfil"] == 1) {
          echo '<div class="box-header with-border">
        
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Crear Torneo
          </button>

        </div>';

        }


        ?>

        <div class="box-body">

          <!--===========================
          =            TABLA            =
          ============================-->
          <table class="table table-bordered table-striped dt-responsive tablas">
            
            <thead>

              <tr>
                <th style="width:10px"></th>
                <th>Fecha</th>
                <th>Juego</th>
                <th>Lugar</th>
                <th>Hora</th>
                <th>Acciones</th>
              </tr>

            </thead>
            <tbody>

            <?php
    
              $item = null;
              $valor = null;
              $torneos = ControladorTorneo::ctrMostrarTorneos($item, $valor);

              foreach ($torneos as $key => $value) {
                echo'<tr>
                      <td>1</td>
                      <td>'.$value["fecha"].'</td>
                      <td>'.$value["juego"].'</td>
                      <td>'.$value["lugar"].'</td>
                      <td>'.$value["horaInicio"].'</td>
          
                      <td>

                        <div class="btn-group">
                          <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                        </div>

                      </td>
                    </tr>';
              }

            ?>

            </tbody>

          </table>

          </div>

        </div>

      </div>

    </section>

  </div>

  <!--============================================
  =            VENTANA MODAL USUARIOS            =
  =============================================-->
  
  <div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <div class="modal-body">
          <div class="box-body">
            <!-- Entrada nombre -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
              </div>
            </div>
              <!-- Entrada usuario -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>
                </div>
            </div>
              <!-- Entrada password -->
            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar password" required>
                </div>
            </div>
              <!-- Entrada para seleccionar perfil -->
            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="nuevoPerfil">

                    <option value="">Seleccionar perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>

                  </select>
                </div>
            </div>
            <!-- Entrada password -->
            <div class="form-group">
               <div class="panel">

                <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 4 MB</p>
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

               </div>
            </div>
            </div>

          </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>
        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>
    </form>

    </div>

  </div>

</div>
  
  <!--====  End of VENTANA MODAL USUARIOS  ====-->
  
