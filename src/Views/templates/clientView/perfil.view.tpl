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
        <div class="col-sm-12 col-md-6 py-3">
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
            <i class="fa fa-lock fa-lg" style="color: #050505;"></i>
            <h4 class="text-dark">Password</h4>
            <hr>
            <h5>Password: •••••••••••••</h5>
            <ol class="breadcrumb m-4">
            <li class="breadcrumb-item"><a href="#" class="text-dark">Change Password</a></li>
        </ol>
            <br>
             <i class="fa fa-bars fa-lg" style="color: #050505;"></i>
            <h4 class="text-dark">Preferences</h4>
            <hr>
            <ol class="breadcrumb m-4">
            <li class="breadcrumb-item"><a href="#" class="text-dark">NEWSLETTER PREFERENCES</a></li>
        </ol>
            <ol class="breadcrumb m-4">
            <li class="breadcrumb-item"><a href="#" class="text-dark">NOTIFICATION PREFERENCES</a></li>
        </ol>

        </div>
        <div class="col-sm-12 col-md-6 py-3 px-0">
             <i class="fa fa-address-book fa-lg" style="color: #050505;"></i>
            <h4 class="text-dark">Address Book</h4>
            <hr>
            <button class="btn btn-dark col-3 py-3" name="btnAgregar" id="btnAgregar">ADD NEW</button>

        </div>
    </div>
 

