<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container-fluid">
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item ">
                <a class="nav-link active text-light" href="#">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-light" href="#">les derniers Posts</a>
              </li>
            </ul>
            <form class="d-flex justify-content-between" role="search">
              <div class="d-flex align-items-center">
                <img style="width: 6%;" src="logo.png" alt="">
              </div>
              <button class="btn btn-outline-success" type="submit">connexion</button>
              <button class="btn btn-primary" type="submit">inscriptions</button>
            </form>
          </div>
        </div>
    </nav>
    
    <div class="container-fluid h-100 position-absolute">
        <div class="row h-100">
            <nav class="col-1 bg-black h-100">
                <div class="d-flex flex-column align-items-center h-100">
                    <div class="nav flex-column mt-3">
                        <a class="nav-link text-white" href="#">Accueil</a>
                        <a class="nav-link text-white" href="#">Mes Posts</a>
                        <a class="nav-link text-white" href="#">Modifier mon profil</a>
                        <button class="btn btn-outline-danger mt-5">Déconnexion</button>
                    </div>
                    
                </div>
            </nav>
        </div>
    </div>