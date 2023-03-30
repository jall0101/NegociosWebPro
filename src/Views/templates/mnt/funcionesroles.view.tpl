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
          {{if new_enabled}}
          <button id="btnAdd">Nuevo</button>
          {{endif new_enabled}}
        </th>
      </tr>
    </thead>

    <tbody>
      {{foreach funcionesroles}}
      <tr>

        <td>
            <a href="index.php?page=Mnt_FuncionRol&mode=DSP&rolescod={{rolescod}}">{{rolescod}}</a>
        </td>

        <td>
            <a href="index.php?page=Mnt_FuncionRol&mode=DSP&rolescod={{fncod}}">{{fncod}}</a>
        </td>

        <td>
            <a>{{fnrolest}}</a>
        </td>

        <td>
            <a>{{fnexp}}</a>
        </td>

        <td>
          {{if ~edit_enabled}}

          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_FuncionRol"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="rolescod" value={{rolescod}} />
              <input type="hidden" name="fncod" value={{fncod}} />
              <button type="submit">Editar</button>
          </form>

          {{endif ~edit_enabled}}
          {{if ~delete_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_FuncionRol"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="rolescod" value={{rolescod}} />
              <input type="hidden" name="fncod" value={{fncod}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif ~delete_enabled}}
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