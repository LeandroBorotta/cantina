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
        .bg-gray{
            background-color: #ccc;
        }
        .btn-8{
            background-color: #888;
            color: white;
        }
        .btn-8:hover{
            background-color: #999;
        }
    </style>
    <title>Config - Cantina</title>
</head>
<body>
    
<div class="container-fluid text-center bg-black text-bg-dark p-3">
</div>

<header class="container-fluid">    
    <nav class="navbar">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu">
            <span class="navbar-toggler-icon fs-4"></span>
        </button>
        <span class="h1 fw-bold text-center">Meu Perfil</span>
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
    <form class="shadow p-5 bg-gray" action="/exercíciosIndividuais/cantina/public/config/{{ logado.id }}" method="post">
        <span class="text-success">{{ ok }}</span>
        <span class="text-danger">{{erro}}</span>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" value="{{ logado.nome }}" name="nome" class="form-control width" required>
        </div>
        <div class="mb-3">
            <label for="ra" class="form-label">RA</label>
            <input type="text" id="ra" value="{{ logado.RA }}" name="ra" class="form-control width" required>
        </div>
        <input type="hidden" value="{{ logado.id }}" name="id">
        <label class="form-label" for="seelct">Ano Escolar</label>
        <select class="form-select mb-3" name="ano" aria-label="Escolar select">
            <option value="Sexto" {% if logado.anoEscolar == 'Sexto' %}selected{% endif %}>Sexto</option>
            <option value="Sétimo" {% if logado.anoEscolar == 'Sétimo' %}selected{% endif %}>Sétimo</option>
            <option value="Oitavo" {% if logado.anoEscolar == 'Oitavo' %}selected{% endif %}>Oitavo</option>
            <option value="Nono" {% if logado.anoEscolar == 'Nono' %}selected{% endif %}>Nono</option>
            <option value="Primeiro E.M" {% if logado.anoEscolar == 'Primeiro E.M' %}selected{% endif %}>Primeiro E.M</option>
            <option value="Segundo E.M" {% if logado.anoEscolar == 'Segundo E.M' %}selected{% endif %}>Segundo E.M</option> 
            <option value="Terceiro E.M" {% if logado.anoEscolar == 'Terceiro E.M' %}selected{% endif %}>Terceiro E.M</option>        
        </select>

            
        <div class="mb-3 text-center">
            <input type="submit" value="Salvar" class="btn btn-8">
        </div>
    </form>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>