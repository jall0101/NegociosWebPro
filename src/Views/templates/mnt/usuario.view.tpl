<h1>{{modedsc}}</h1>
<section class="row">
  <form action="index.php?page=Mnt_Usuario&mode={{mode}}&usercod={{usercod}}"
    method="POST"
    class="col-6 col-3-offset"
  >
    <section class="row">
    <label for="usercod" class="col-4">Código</label>
    <input type="hidden" id="usercod" name="usercod" value="{{usercod}}"/>
    <input type="hidden" id="mode" name="mode" value="{{mode}}"/>
    <input type="hidden" name="xssToken" value="{{xssToken}}">
    <input type="text" readonly name="usercoddummy" value="{{usercod}}"/>
    </section>
    <section class="row">
      <label for="useremail" class="col-4">Useremail</label>
      <input type="text" {{readonly}} name="useremail" value="{{useremail}}" maxlength="45" placeholder="Correo de Usuario"/> 
    </section>
    <section class="row">
      <label for="username" class="col-4">Username</label>
      <input type="text" {{readonly}} name="username" value="{{username}}" maxlength="45" placeholder="Nombre de Usuario"/> 
    </section>
    <section class="row">
      <label for="userpswd" class="col-4">Password</label>
      <input type="password" {{readonly}} name="userpswd" value="{{userpswd}}" maxlength="45" placeholder="Password de Usuario"/> 
    </section>
    <section class="row">
      <label for="userpswdest" class="col-4">userpswdest</label>
      <select id="userpswdest" name="userpswdest" {{if readonly}}disabled{{endif readonly}}>
        <option value="ACT" {{userpswdest_ACT}}>ACTIVO </option>
        <option value="INA" {{userpswdest_INA}}>INACTIVO </option>
      </select>
    </section>
    <section class="row">
      <label for="userest" class="col-4">Estado</label>
      <select id="userest" name="userest" {{if readonly}}disabled{{endif readonly}}>
        <option value="ACT" {{userest_ACT}}>ACTIVO </option>
        <option value="INA" {{userest_INA}}>INACTIVO </option>
      </select>
    </section>
    <section class="row">
      <label for="usertipo" class="col-4">Tipo</label>
      <select id="usertipo" name="usertipo" {{if readonly}}disabled{{endif readonly}}>
        <option value="NOR" {{usertipo_NOR}}>NORMAL </option>
        <option value="CON" {{usertipo_CON}}>CONSULTOR  </option>
        <option value="CLI" {{usertipo_CLI}}>CLIENTE </option>
      </select>
    </section>    
   
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
        window.location.assign("index.php?page=Mnt_Usuarios");
      });
  });
</script>