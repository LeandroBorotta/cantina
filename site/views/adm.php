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
        .w-30{
            width: 20px;
        }
        .mais,
        .menos{
            cursor: pointer;
        }
    </style>
    <title>Adm - Cantina</title>
</head>
<body>
    
<div class="container-fluid text-center bg-black text-bg-dark p-3">
</div>

<header class="container-fluid border-bottom">    
    <nav class="navbar">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu">
            <span class="navbar-toggler-icon fs-4"></span>
        </button>
        <span class="h1 fw-bold text-center">Administrador</span>
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
                <a href="/exercíciosIndividuais/cantina/public/adm/pedidos" class="d-block p-3 text-decoration-none text-dark fw-bolder border-bottom">Pedidos</a>
                <a href="/exercíciosIndividuais/cantina/public/sair" class="d-block p-3 text-decoration-none text-dark fw-bolder border-bottom">Sair</a>

            </div>
        </div>
    </div>
    
</header>

<main class="container">
    <div class="row p-5 mt-1">
        <div class="bg-success shadow text-light p-3 col">
            <h2>Entrada - R${{entrada}}</h2>
        </div>
        <div class="bg-danger shadow text-light p-3 col mx-5">
            <h2>Saída - R${{saida}}</h2>
        </div>
        <div class="bg-dark shadow text-light p-3 col">
            <h2>Caixa - R${{caixa}}</h2>
        </div>
    </div>

    <div class="shadow text-dark p-5">
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


    {% for produto in produtos %}
    <section class="modal fade" id="meuModal{{produto.id}}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comprar {{produto.nome}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form action="/exercíciosIndividuais/cantina/public/adm/estoque" method="post">
                <div class="modal-body text-center">
                    <span id="fornecedor"  data-id="{{produto.id}}" class="fw-bold">Preço unidade R${{ produto.precoFornecedor }}</span>
                    <div class="compra">
                    
                        <span class="h5 menos" id="menos">-</span>
                            <input  class="w-30 mx-2 border-0 bg-transparent valor" name="quantidade" readonly id="valor"></input>
                            <input type="hidden" name="idProduto" value="{{ produto.id }}">
                        <span class="h5 mais" id="mais">+</span>
                    </div>
                    <div class="compra d-flex justify-content-center align-items-center my-3">
                            <input id="total" name="total" class="h6 bg-transparent border-0 total text-center"  readonly></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Comprar</button>
                    
                </div>
            </form>
            </div>
        </div>
    </section>
    {% endfor %}

</main>

<script>
    var modais = document.querySelectorAll(".modal");

    modais.forEach(function(modal) {
        var menosElement = modal.querySelector(".menos");
        var maisElement = modal.querySelector(".mais");
        var valorElement = modal.querySelector(".valor");
        var totalElement = modal.querySelector(".total");
        var precoElement = modal.querySelector("[id^='fornecedor']");

        var idProduto = precoElement.getAttribute('data-id');
        var preco;

        switch (parseInt(idProduto)) {
        case 1:
            preco = 2.00;
            break;
        case 2:
            preco = 1.25;
            break;
        case 3:
            preco = 3.80;
            break;
        case 4:
            preco = 0.50;
            break;
        case 5:
            preco = 0.25;
            break;
        default:
            preco = 0;
            break;
        }

        var valor = 1;
        totalElement.textContent = `Total: R$ ${(valor * preco).toFixed(2)}`;

        menosElement.addEventListener("click", function() {
        if (valor > 1) {
            valor--;
            valorElement.value = valor;
            totalElement.value = `Total: R$ ${(valor * preco).toFixed(2)}`;
        }
        });

        maisElement.addEventListener("click", function() {
        valor++;
        valorElement.value = valor;
        totalElement.value = `Total: R$ ${(valor * preco).toFixed(2)}`;
        });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>