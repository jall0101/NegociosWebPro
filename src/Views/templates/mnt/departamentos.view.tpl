<h1>Gestión de Departamentos</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Departamento</th>
        <th>
          {{if new_enabled}}
          <button id="btnAdd">Nuevo</button>
          {{endif new_enabled}}
        </th>
      </tr>
    </thead>


    <tbody>
      {{foreach departamentos}}
        <tr>
        <td>{{departamentocod}}</td>
        <td>
          {{if ~departamentos_view}}
          <a href="index.php?page=Mnt_Departamento&mode=DSP&departamentocod={{departamentocod}}">{{nombredepartamento}}</a>
           {{endif ~departamentos_view}}
          {{ifnot ~departamentos_view}}
          {{nombredepartamento}}
           {{endifnot ~departamentos_view}}
          </td>
        <td>
        {{if ~departamentos_edit}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_Departamento"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="departamentocod" value={{departamentocod}} />
              <button type="submit">Editar</button>
          </form>
           {{endif ~departamentos_edit}}
          {{if ~departamentos_delete}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_Departamento"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="departamentocod" value={{departamentocod}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif ~departamentos_delete}}
        </td>
      </tr>
      {{endfor departamentos}}
    </tbody>
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_departamento&mode=INS&departamentocod=0");
      });
    });
</script>
