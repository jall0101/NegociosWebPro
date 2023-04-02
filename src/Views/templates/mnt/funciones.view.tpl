<h1>Gestión de Funciones</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th>
          {{if funciones_new}}
          <button id="btnAdd">Nuevo</button>
          {{endif funciones_new}}
        </th>
      </tr>
    </thead>
    <tbody>
      {{foreach funciones}}
      <tr>
        <td>{{fncod}}</td>
        <td>
           {{if ~funciones_view}}
          <a href="index.php?page=mnt_funcion&mode=DSP&fncod={{fncod}}">{{fndsc}}</a></td>
          {{endif ~funciones_view}}
          {{ifnot ~funciones_view}}
           {{fndsc}}
           {{endifnot ~funciones_view}}
        
        <td>
          {{if ~funciones_edit}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_funcion"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="fncod" value={{fncod}} />
              <button type="submit">Editar</button>
          </form>
          {{endif ~funciones_edit}}
          {{if ~funciones_delete}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mnt_funcion"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="fncod" value={{fncod}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif ~funciones_delete}}
        </td>
      </tr>
      {{endfor funciones}}
    </tbody>
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_funcion&mode=INS&fncod=0");
      });
    });
</script>