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
          {{if new_enabled}}
          <button id="btnAdd">Nuevo</button>
          {{endif new_enabled}}
        </th>
      </tr>
    </thead>


    <tbody>
      {{foreach tallas}}
        <tr>
        <td>{{tallacod}}</td>
        <td><a href="index.php?page=Mnt_Talla&mode=DSP&tallacod={{tallacod}}">{{descripciontalla}}</a></td>
        <td>
        {{if ~edit_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_Talla"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="tallacod" value={{tallacod}} />
              <button type="submit">Editar</button>
          </form>
          {{endif ~edit_enabled}}
          {{if ~delete_enabled}}
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="Mnt_Talla"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="tallacod" value={{tallacod}} />
              <button type="submit">Eliminar</button>
          </form>
          {{endif ~delete_enabled}}
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