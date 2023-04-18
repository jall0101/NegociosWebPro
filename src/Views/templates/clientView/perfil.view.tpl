<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb m-4">
            <li class="breadcrumb-item"><a href="#" class="text-dark">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Perfil</li>
        </ol>
    </nav>
     <h3 class="m-4">Dashboard</h3>
  <h2 class="m-4">My Account</h2>
   <ol class="breadcrumb m-4">
            <li class="breadcrumb-item"><a href="index.php?page=sec_logout" class="text-dark">Logout</a></li>
        </ol>
</div>
</div>

<div class="container-fluid m-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 py-3">
            <i class="fa fa-user fa-lg" style="color: #050505;"></i>
            <h4>Profile</h4>
            <hr>
            <h5>Full Name: {{clientname}}</h5>
            <h5>Gender: {{clientgender}}</h5>
            <h5>Phone: {{clientphone1}}</h5>
            <h5>Email: {{clientemail}}</h5>
            <ol class="breadcrumb m-4">
            <li class="breadcrumb-item"><a href="#" class="text-dark">Edit Profile</a></li>
        </ol>
        <br>
            <br>
            <i class="fa fa-bars fa-lg" style="color: #050505;"></i>
            <h4 class="text-dark">Preferences</h4>
            <hr>
            <ol class="breadcrumb m-4">
                <li class="breadcrumb-item"><a href="#" class="text-dark">Términos y Privacidad</a></li>
            </ol>

            

            <i class="fa-solid fa-book fa-xl" style="color: #050505;"></i>
            <h4 class="text-dark">Historal</h4>
            <hr>
            <ol class="breadcrumb m-4">

        <!--DESDE ACÁ LA TABLA-->
        <section class="WWFilter">

        </section>
        <section class="WWList table-responsive">
        <table class="table table-striped table-hover tb-align">
            <thead>
            <tr class="bg-gris_oscuro tb-align text-white p-5">
                <th scope="col">Código Venta</th>
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

    </div>
</div>
 

