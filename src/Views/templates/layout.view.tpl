<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>{{SITE_TITLE}}</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/{{BASE_DIR}}/public/css/appstyle.css" />
  <script src="https://kit.fontawesome.com/{{FONT_AWESOME_KIT}}.js" crossorigin="anonymous"></script>
  {{foreach SiteLinks}}
    <link rel="stylesheet" href="/{{~BASE_DIR}}/{{this}}" />
  {{endfor SiteLinks}}
  {{foreach BeginScripts}}
    <script src="/{{~BASE_DIR}}/{{this}}"></script>
  {{endfor BeginScripts}}
</head>
<body>
  <header>
    <input type="checkbox" class="menu_toggle" id="menu_toggle" />
    <label for="menu_toggle" class="menu_toggle_icon" >
      <div class="hmb dgn pt-1"></div>
      <div class="hmb hrz"></div>
      <div class="hmb dgn pt-2"></div>
    </label>
    <h1>{{SITE_TITLE}}</h1>
    <nav id="menu">
      <ul>
        <li><a href="index.php?page=index"><i class="fas fa-home"></i>&nbsp;Inicio</a></li>
        <li><a href="index.php?page=Mnt-Categorias"><i class="fas fa-home"></i>&nbsp;Categorías</a></li>
        <li><a href="index.php?page=sec_login"><i class="fas fa-sign-in-alt"></i>&nbsp;Iniciar Sesión</a></li>
        <li><a href="index.php?page=sec_register"><i class="fas fa-user-plus"></i>&nbsp;Crear Cuenta</a></li>
      </ul>
    </nav>
  </header>
  <main>
  {{{page_content}}}
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <footer>
    <div>Todo los Derechos Reservados 2022 &copy;</div>
  </footer>
  {{foreach EndScripts}}
    <script src="/{{~BASE_DIR}}/{{this}}"></script>
  {{endfor EndScripts}}
</body>
</html>
