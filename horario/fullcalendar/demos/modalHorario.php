<?php


if (isset($_SESSION['admin'])) {
?>
<!-- Modal to Event Details -->
<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Event Details</h4>
 </div>
 <div id="modalBody" class="modal-body">
 <h4 id="modalTitle" class="modal-title"></h4>
 <div id="modalWhen" style="margin-top:5px;"></div>
 </div>
 <input type="hidden" id="eventID"/>
 <div class="modal-footer">

 	<button class="btn btn-warning" id="confirmarTodos" data-dismiss="modal" aria-hidden="true">Confirmar Todos </button>
  <button class="btn btn-success" id="confirmar" data-dismiss="modal" aria-hidden="true">Confirmar</button>

 <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
 <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
 </div>
 </div>
</div>
</div>




<?php

  }

 ?>
 <div id="ModalConfiguracionHoras" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="panel panel-warning">

  <div class="panel-heading">CONFIGURACION HORARIO (trimestres) <button type="button" class="close" data-dismiss="modal">x</button></div>

</div>
      <div class="modal-body">
             
            <div class="row"> 
              <div class="col-sm-12"> 
            <label class="title">MOSTRAR HORAS DEL HORARIO </label>
            </div>  
          <div class="col-sm-6">                
              <label>Desde</label>
              <input type="time" id="InicioHora" class="form-control">
        </div>
        <div class="col-sm-6">

              <label>Hasta</label>
              <input type="time" id="FinHora" class="form-control" ng-model="data.action.date">
        </div>    
      </div>
          
            
      </div>
      <div class="modal-footer">
         <button class="btn btn-warning" id="ActualizarHorasHorario" data-dismiss="modal"> ACTUALIZAR </button>
      </div>
    </div>

  </div>
</div>

 <!--=============MODAL CONFIGURACION==================== -->
<div id="ModalConfiguracion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="panel panel-info">

  <div class="panel-heading">CONFIGURACION HORARIO (trimestres) <button type="button" class="close" data-dismiss="modal">x</button></div>

</div>
      <div class="modal-body">
          <div class="row"> 
            <div class="col-sm-12"> 
            <label class="title">PRIMER TRIMESTRE</label>
            </div>                            
            <div class="col-sm-6">                
              <label>Desde</label>
              <input type="datetime-local" id="inicioPrimero" class="form-control">
        </div>
        <div class="col-sm-6">

              <label>Hasta</label>
              <input type="datetime-local" id="finPrimero" class="form-control">
        </div>    
          </div>
          <hr>
            <div class="row"> 
              <div class="col-sm-12"> 
            <label class="title">SEGUNDO TRIMESTRE</label>
            </div>  
           <div class="col-sm-6">               
              <label>Desde</label>
              <input type="datetime-local" id="inicioSegundo" class="form-control">
        </div>
        <div class="col-sm-6">

              <label>Hasta</label>
              <input type="datetime-local" id="finSegundo" class="form-control">
        </div>    
          </div>
            <hr>
            <div class="row"> 
              <div class="col-sm-12"> 
            <label class="title">TERCER TRIMESTRE</label>
            </div>  
          <div class="col-sm-6">                
              <label>Desde</label>
              <input type="datetime-local" id="inicioTercer" class="form-control">
        </div>
        <div class="col-sm-6">

              <label>Hasta</label>
              <input type="datetime-local" id="finTercer" class="form-control">
        </div>    
          </div>
            <hr>
            <div class="row"> 
              <div class="col-sm-12"> 
            <label class="title">CUARTO TRIMESTRE</label>
            </div>  
          <div class="col-sm-6">                
              <label>Desde</label>
              <input type="datetime-local" id="inicioCuarto" class="form-control">
        </div>
        <div class="col-sm-6">

              <label>Hasta</label>
              <input type="datetime-local" id="finCuarto" class="form-control" ng-model="data.action.date">
        </div>    
      </div>
          
            
      </div>
      <div class="modal-footer">
         <button class="btn btn-info" id="Actualizar" data-dismiss="modal"> ACTUALIZAR </button>
      </div>
    </div>

  </div>
</div>

<div id="createEventModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Agregar Evento</h4>
 </div>
 <div class="modal-body">
 <div class="control-group">
    <label class="control-label" for="inputPatient">Competencia:</label>
   <div class="field desc">
   <input class="form-control" id="title" name="title" placeholder="Titulo  Evento" type="text" value="">
   </div>
      
          <div class="form-group">
          <label class="control-label" for="inputPatient">Descripción:</label>
          <div class="field desc">
         <input class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripción" type="text" value="">
         </div>
          </div>
            <div class="form-group">
          <label class="control-label" for="inputPatient">Instructor:</label>
          <div class="field desc">
         <select  disabled name="instructor" class="form-control" id="Instructor"></select>
             <label class="control-label" for="inputPatient">Fichas:</label>
                <select name="Fichas" class="form-control" id="Fichas"></select>
         </div>
          </div>
          <div class="form-group">
          <label for="color" class="control-label">Color</label>
          <div class="field desc">
            <select name="color" class="form-control" id="color">
              <option value="">Choose</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; Azul Oscuro</option>
              <option style="color:#008000;" value="#008000">&#9724; Verde </option>  
              <option style="color:#11AF78;" value="#11AF78">&#9724; Verdoso </option>           
              <option style="color:#9D0523;" value="#9D0523">&#9724; Vinotinto</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
              <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
              <option style="color:#ff0011;" value="#ff0011">&#9724; Rojo Oscuro</option>
              <option style="color:#8A06B8;" value="#8A06B8">&#9724; Morado</option>
              <option style="color:#000;" value="#000">&#9724; Negro</option>
                   
              
            </select>
           
          </div>
          </div>
         
           <br> <br>
         <div class="row">
         <br>
             <div class="col-sm-6">
                  <label for="dias" class="control-label">DESDE LA FECHA SELECCIONADA, SELECCIONAR TODOS LOS:</label>
                  <div class="form-group">        
                      <label for="dias" class="control-label">LUNES</label>
                      <input type="checkbox" class="dias" name="dias" id="Lunes">
                  </div>
                   <div class="form-group">        
                      <label for="dias" class="control-label">MARTES</label>
                      <input type="checkbox" class="dias" name="dias" id="Martes">
                  </div>
                   <div class="form-group">        
                      <label for="dias" class="control-label">MIERCOLES</label>
                      <input type="checkbox" class="dias" name="dias" id="Miercoles">
                  </div>
                   <div class="form-group">        
                      <label for="dias" class="control-label">JUEVES</label>
                      <input type="checkbox" class="dias" name="dias" id="Jueves">
                  </div>
                   <div class="form-group">        
                      <label for="dias" class="control-label">VIERNES</label>
                      <input type="checkbox" class="dias" name="dias" id="Viernes">
                  </div>
                   <div class="form-group">        
                      <label for="dias" class="control-label">SABADO</label>
                      <input type="checkbox" class="dias" name="dias" id="Sabado">
                  </div>
                  <div class="form-group">        
                      <label for="dias" class="control-label">DOMINGO</label>
                      <input type="checkbox" class="dias" name="dias" id="Domingo">
                  </div>
              </div>
               <div class="col-sm-6">
                  <label for="dias" class="control-label">HASTA EL FINANL DEL TRIMESTRE:</label>
                  <div class="form-group">        
                      <label for="dias" class="control-label">PRIMERO</label>
                      <input type="checkbox" class="dias" name="dias" id="Primero">
                  </div>
                   <div class="form-group">        
                      <label for="dias" class="control-label">SEGUNDO</label>
                      <input type="checkbox" class="dias" name="dias" id="Segundo">
                  </div>
                   <div class="form-group">        
                      <label for="dias" class="control-label">TERCERO</label>
                      <input type="checkbox" class="dias" name="dias" id="Tercero">
                  </div>
                   <div class="form-group">        
                      <label for="dias" class="control-label">CUARTO</label>
                      <input type="checkbox" class="dias" name="dias" id="Cuarto">
                  </div>
               
              </div>
          </div>
         

         
          <div class="form-group">
          
          </div>

 </div>
 
 <input type="hidden" id="startTime"/>
 <input type="hidden" id="endTime"/>
 

 <div class="control-group">
 <label class="control-label" for="when">When:</label>
 <div class="controls controls-row" id="when" style="margin-top:5px;">
 </div>
 </div>
 
 </div>
 <div class="modal-footer">
 <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
 <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
 </div>
 </div>

 </div>
</div>

