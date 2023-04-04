<h1>Adminsitración de Funcion Rol</h1>
<section class="WWFilter">
</section>

<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código Roles</th>
        <th>Código Funciones</th>
        <th>Tipo</th>
        <th>Fecha de Expiración</th>

        <th>
          {{if funcionesroles_new}}
          <button id="btnAdd">Nuevo</button>
          {{endif funcionesroles_new}}
        </th>
      </tr>
    </thead>

    <tbody>
      {{foreach funcionesroles}}
      <tr>

        <td>
          {{if ~funcionesroles_view}}
            <a href="index.php?page=Mnt_FuncionRol&mode=DSP&rolescod={{rolescod}}">{{rolescod}}</a>
          {{endif ~funcionesroles_view}}
          {{ifnot ~funcionesroles_view}}
            {{rolescod}}
          {{endifnot ~funcionesroles_view}}
        </td>

        <td>
          {{if ~funcionesroles_view}}
           <a href="index.php?page=Mnt_FuncionRol&mode=DSP&rolescod={{fncod}}">{{fncod}}</a>
          {{endif ~funcionesroles_view}}
          {{ifnot ~funcionesroles_view}}
            {{fncod}}
          {{endifnot ~funcionesroles_view}}
            
        </td>

        <td>
            <a>{{fnrolest}}</a>
        </td>

        <td>
            <a>{{fnexp}}</a>
        </td>

        <td>
          {{if ~funcionesroles_edit}}

          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_FuncionRol"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="rolescod" value={{rolescod}} />
              <input type="hidden" name="fncod" value={{fncod}} />
              <button type="submit">Editar</button>
          </form>

          {{endif ~funcionesroles_edit}}
          {{if ~funcionesroles_delete}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_FuncionRol"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="rolescod" value={{rolescod}} />
              <input type="hidden" name="fncod" value={{fncod}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif ~funcionesroles_delete}}
        </td>

      </tr>
      {{endfor funcionesroles}}
    </tbody>

  </table>
</section>

<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=Mnt_funcionrol&mode=INS&rolescod=0");
      });
    });
</script>