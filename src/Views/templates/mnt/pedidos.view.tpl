<h1>Gestión de Pedidos</h1>
<section class="WWFilter">

</section>
<section class="WWList table-responsive">
  <table class="table table-striped table-hover tb-align">
    <thead>
      <tr class="bg-gris_oscuro tb-align text-white p-5">
        <th scope="col">Código Pedido</th>
        <th scope="col">Código venta</th>
        <th scope="col">Direccion</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Estado</th>
        <th scope="col">Pais</th>
        <th scope="col">Telefono Cont</th>
        <th scope="col">Pedido Estado</th>
      </tr>
    </thead>


    <tbody>
      {{foreach pedidos}}
        <tr class="bg-white">
            <td>
              <a href="index.php?page=Mnt_Pedido&mode=DSP&cod={{pedidocod}}">{{pedidocod}}</a>
              </td>
            <td>
                <a href="index.php?page=Mnt_Pedido&mode=DSP&cod={{ventacod}}">{{ventacod}}</a>
            </td>
            <td>{{direccion}}</td>

            <td>{{ciudad}}</td>

            <td>{{estado}}</td>

            <td>{{pais}}</td>

            <td>{{telefonoCont}}</td>
            <td>{{pedidoest}}</td>

      </tr>
      {{endfor pedidos}}
    </tbody>
  </table>
</section>


<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_pedido&mode=INS&pedidocod=0");
      });
    });
</script>