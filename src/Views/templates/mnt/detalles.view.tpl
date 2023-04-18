<h1>Detalles De La Venta</h1>
<section class="WWFilter">

</section>
<section class="WWList table-responsive">
  <table class="table table-striped table-hover tb-align">
    <thead>
      <tr class="bg-gris_oscuro tb-align text-white p-5">
        <th scope="col">Código Venta</th>
        <th scope="col">Nombre Del Producto</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio Unitario</th>
        <th scope="col">Importe</th>
      </tr>
    </thead>


    <tbody>
      {{foreach Detalles}}
        <tr class="bg-white">

            <td>
                <a href="index.php?page=Mnt_Detalle&mode=DSP&cod={{detallecod}}">{{detallecod}}</a>
            </td>

            <td>{{nombrezapato}}</td>
            <td>{{Descripcion}}</td>
            <td>{{Cantidad}}</td>
            <td>{{precio}}</td>
            <td>{{Importe}}</td>
      </tr>
      {{endfor Detalles}}
    </tbody>
  </table>
</section>


<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_detalle&mode=INS&detallecod=0");
      });
    });
</script>