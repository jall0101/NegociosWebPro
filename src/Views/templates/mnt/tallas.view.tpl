<h1>Gestión de Tallas</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Talla</th>
        <th>
          {{if tallas_new}}
          <button id="btnAdd">Nuevo</button>
          {{endif tallas_new}}
        </th>
      </tr>
    </thead>


    <tbody>
      {{foreach tallas}}
        <tr>
        <td>{{tallacod}}</td>
        <td>
           {{if ~tallas_view}}
          <a href="index.php?page=Mnt_Talla&mode=DSP&tallacod={{tallacod}}">{{descripciontalla}}</a></td>
           {{endif ~tallas_view}}
           {{ifnot ~tallas_view}}
            {{descripciontalla}}
          {{endifnot ~tallas_view}}
        <td>
        {{if ~tallas_edit}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_Talla"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="tallacod" value={{tallacod}} />
              <button type="submit">Editar</button>
          </form>
          {{endif ~tallas_edit}}
          {{if ~tallas_delete}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_Talla"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="tallacod" value={{tallacod}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif ~tallas_delete}}
        </td>
      </tr>
      {{endfor tallas}}
    </tbody>
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_talla&mode=INS&tallacod=0");
      });
    });
</script>