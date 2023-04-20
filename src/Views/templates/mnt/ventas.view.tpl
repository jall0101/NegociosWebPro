<h1>Gestión de Ventas</h1>
<section class="WWFilter">

</section>
<section class="WWList table-responsive">
  <table class="table table-striped table-hover tb-align">
    <thead>
      <tr class="bg-gris_oscuro tb-align text-white p-5">
        <th scope="col">Código Venta</th>
        <th scope="col">Código Usuario</th>
        <th scope="col">Fecha Venta</th>
        <th scope="col">ISV</th>
        <th scope="col">Cantidad Bruta</th>
        <th scope="col">Comisión PayPal</th>
        <th scope="col">Cantidad Neta</th>
      </tr>
    </thead>


    <tbody>
      {{foreach ventas}}
        <tr class="bg-white">

            <td>
                <a href="index.php?page=Mnt_Venta&mode=DSP&cod={{ventacod}}">{{ventacod}}</a>
            </td>
            <td>
                {{usercod}}
            </td>

            <td>{{fechaventa}}</td>
            <td>{{isv}}</td>
            <td>{{cantidadBruta}}</td>
            <td>{{comisionPayPal}}</td>
            <td>{{cantidadNeta}}</td>
      </tr>
      {{endfor ventas}}
    </tbody>
  </table>
</section>


<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_venta&mode=INS&ventacod=0");
      });
    });
</script>