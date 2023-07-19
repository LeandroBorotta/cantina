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

<main class="shadow text-dark p-5">
    <table class="table border-dark border border-bottom">
        <thead>
        <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col" class="text-center">PRODUTO</th>
        <th scope="col" class="text-center" >QUANTIDADE</th>
        <th scope="col" class="text-center">AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        <span class="text-danger h6 mb-2">{{vazio}}</span>
        <span class="text-success h6 mb-2">{{ok}}</span>
            {% for produto in produtos %}
                {%if produto.quantidade < 20 %}
                <tr class="table-danger">
                    <td class="text-center">{{produto.id}}</td>
                    <td class="text-center">{{produto.nome}}</td>
                    <td class="text-center">{{produto.quantidade}}</td>
                    <td class="text-center">
                        <button type="button" class="bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#meuModal{{produto.id}}"><i class="bi bi-basket-fill h3 text-danger"></i></button>
                    </td>
                </tr>
                {% else %}
                <tr>
                    <td class="text-center">{{produto.id}}</td>
                    <td class="text-center">{{produto.nome}}</td>
                    <td class="text-center">{{produto.quantidade}}</td>
                    <td class="text-center">
                    <button type="button" class="bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#meuModal{{produto.id}}"><i class="bi bi-basket-fill h3 text-success"></i></button>
                    </td>
                </tr>
                {% endif%}
            {% endfor %}
    </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>