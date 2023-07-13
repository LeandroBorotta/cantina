<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1/font/bootstrap-icons.css">
    <style>
        .width{
            width: 300px;
        }
    </style>
    <title>Cadastro - Cantina</title>
</head>
<body>
    
<div class="container-fluid text-center bg-black text-bg-dark p-3">
</div>

<header class="container-fluid">    
    <nav class="navbar">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu">
            <span class="navbar-toggler-icon fs-4"></span>
        </button>
        <span class="h1 fw-bold text-center">Cantina</span>
        <div class="align-items-center invisible">
            <a href="#" class="text-decoration-none" id="pesquisa">
                <i class="bi-search fs-2 text-black"></i>
            </a>
            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#carrinho" class="text-decoration-none ms-3" id="#carrinho">
                <i class="bi-cart fs-2 text-black"></i>
            </a>   
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" id="menu" tabindex="-1">
        <div class="offcanvas-header">
            <span class="invisible">Texto invisivel</span>
            <button class="btn btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container h-100 d-flex flex-column">
                <a href="/exercíciosIndividuais/cantina/public/" class="d-block p-3 text-decoration-none text-dark fw-bolder border-bottom">Voltar para Home</a>

                <div class="d-flex align-items-center ms-2 mt-3">
                    <a href="#" class="text-decoration-none d-block border rounded-circle p-2 border-dark me-2">
                        <i class="bi-linkedin fs-6 text-black"></i>
                    </a> 
                    <a href="#" class="text-decoration-none d-block border rounded-circle p-2 border-dark me-2">
                        <i class="bi-instagram fs-6 text-black"></i>
                    </a>   
                    <a href="#" class="text-decoration-none d-block border rounded-circle p-2 border-dark me-2">
                        <i class="bi-twitter fs-6 text-black"></i>
                    </a>
                    <a href="#" class="text-decoration-none d-block border rounded-circle p-2 border-dark me-2">
                        <i class="bi-tiktok fs-6 text-black"></i>
                    </a>  
                    <a href="#" class="text-decoration-none d-block border rounded-circle p-2 border-dark me-2">
                        <i class="bi-youtube fs-6 text-black"></i>
                    </a>
                    <a href="#" class="text-decoration-none d-block border rounded-circle p-2 border-dark me-2">
                        <i class="bi-facebook fs-6 text-black"></i>
                    </a>            
                </div>
            </div>
        </div>
    </div>
    
</header>

<main class="container p-5 d-flex align-items-center justify-content-center">
    <form action="/exercíciosIndividuais/cantina/public/cadastro" method="post">
        <span class="text-danger">{{erro}}</span>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control width" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">RA</label>
            <input type="RA" id="ra" name="ra" class="form-control width" required>
        </div>
        <div class="mb-3">
            <label for="select" class="form-label">Selecione o seu ano</label>
            <select class="form-select" name="ano" aria-label="Default select example">
                <option value="Sexto">Sexto</option>
                <option value="Sétimo">Sétimo</option>
                <option value="Oitavo">Oitavo</option>
                <option value="Nono">Nono</option>
                <option value="Primeiro E.M">Primeiro E.M</option>
                <option value="Segundo E.M">Segundo E.M</option> 
                <option value="Terceiro E.M">Terceiro E.M</option>        
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control width" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control width" required>
        </div>
        <div class="mb-3 d-flex">
             <span>Já possui conta?</span> <a href="/exercíciosIndividuais/cantina/public/login" class="nav-link text-primary mx-3">Entre por aqui!!</a>
        </div>
        <div class="mb-3">
            <input type="submit" value="Entrar" class="btn btn-primary">
        </div>
    </form>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>