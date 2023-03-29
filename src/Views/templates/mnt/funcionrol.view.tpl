<h1>{{modedsc}}</h1>
<section class="row">
  <form action="index.php?page=Mnt_FuncionRol&mode={{mode}}&rolescod={{rolescod}}"
    method="POST"
    class="col-6 col-3-offset"
  >


    <section class="row">
      <label for="rolescod" class="col-4">Código Rol</label>
      <input type="text" {{readonly}} name="rolescod" value="{{rolescod}}" maxlength="45" placeholder="Código Rol"/>
      {{if rolescod}}
        <span class="error col-12">{{rolescod}}</span>
      {{endif rolescod}}
    </section>

    <section class="row">
      <label for="fncod" class="col-4">Código Función</label>
      <input type="text" {{readonly}} name="fncod" value="{{fncod}}" maxlength="45" placeholder="Código Función"/>
      {{if fncod}}
        <span class="error col-12">{{fncod}}</span>
      {{endif fncod}}
    </section>


    <section class="row">
      <label for="fnrolest" class="col-4">Estado</label>
      <select id="fnrolest" name="fnrolest" {{if readonly}} disabled{{endif readonly}}>
        <option value="ACTIVO" {{fnrolest_ACT}}>ACTIVO</option>
        <option value="INACTIVO" {{fnrolest_INA}}>INACTIVO</option>
      </select>
    </section>

    <section class="row">
      <label for="fnexp" class="col-4">Fecha de Expiración</label>
      <input type="date" {{readonly}} name="fnexp" value="{{fnexp}}" maxlength="45" placeholder="Fecha expiración"/>
      {{if fnexp_error}}
        <span class="error col-12">{{fnexp_error}}</span>
      {{endif fnexp_error}}
    </section>
    <hr>

    {{if has_errors}}
        <section>
          <ul>
            {{foreach general_errors}}
                <li>{{this}}</li>
            {{endfor general_errors}}
          </ul>
        </section>
    {{endif has_errors}}

  
    <section>
      {{if show_action}}
      <button type="submit" name="btnGuardar" value="G">Guardar</button>
      {{endif show_action}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </section>
  </form>
</section>


<script>
  document.addEventListener("DOMContentLoaded", function(){
      document.getElementById("btnCancelar").addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=Mnt_FuncionesRoles");
      });
  });
</script>