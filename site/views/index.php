<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1/font/bootstrap-icons.css">
    

    <style>
        .bgCinza{
            background-color: #eee;
        }
        .imagemGrande{
            width: 60%;
        }
        .menos,
        .mais{
            cursor: pointer;
        }

    </style>
    <title>Cantina</title>
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
        <div class="align-items-center">
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
                
                
                {% if user == true %}
                <a href="/exercíciosIndividuais/cantina/public/config/{{ logado.id }}" class="d-block p-3 text-decoration-none text-dark fw-bolder border-bottom">Configurações</a>
                <a href="/exercíciosIndividuais/cantina/public/sair" class="d-block p-3 text-decoration-none text-dark fw-bolder border-bottom">Sair</a>
                {% else %}
                <a href="/exercíciosIndividuais/cantina/public/login" class="d-block p-3 text-decoration-none text-dark fw-bolder border-bottom">Entrar</a>
                {% endif %}

                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Buscar em nossa loja">
                    <button type="submit" class="bi-search bg-light"></button>
                </div>

                <div class="d-flex align-items-center ms-2">
                    <a href="https://www.linkedin.com/in/leandro-borotta-ab36b224b/" target="_blank" class="text-decoration-none d-block border rounded-circle p-2 border-dark me-2">
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

    <div class="offcanvas offcanvas-end overflow-y-scroll" id="carrinho" tabindex="-1">
        <div class="CarrinhoSemItens">
        <div class="offcanvas-header bgCinza align-items-center d-flex py-3">
            <span class="invisible">texto</span>
            <span class="h5 fw-bolder">Carrinho</span>
            <button class="btn btn-close fs-5" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body mt-3">
            <div class="container text-center d-flex flex-column">
                <span class="mb-3">Seu carrinho está vazio no momento</span>
                <i class="bi-cart4 h1 fs-1 mb-3"></i>

                {% if user == true %}
                <a href="/exercíciosIndividuais/cantina/public/" class="btn btn-dark text-decoration-none">Comece a comprar</a>
                {% else %}
                <a href="/exercíciosIndividuais/cantina/public/login" class="btn btn-dark text-decoration-none">Comece a comprar</a>
                {% endif %}

            </div>
        </div>
        </div>
        <div class="CarrinhoComItens">
            <div class="offcanvas-header bgCinza align-items-center d-flex py-3">
                <span class="h5 fw-bolder invisible">texto</span>
                <span class="h5 fw-bolder">Carrinho</span>
                <button class="btn btn-close fs-5" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body mt-3">
                <div class="container-fluid text-center d-flex flex-column">
                <form class="d-flex flex-column" method="post" enctype="multipart/form-data" action="/exercíciosIndividuais/cantina/public/pagamento" id="formCarrinho">
                    <ul class="list-unstyled ul" id="carrinho">

                    </ul>
                    <span class="h5 fw-bold align-self-end">Total: <span id="valorTotal">R$20,00</span></span>
                   


                        <button type="submit"  class="btn btn-dark text-decoration-none">Continuar comprando</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</header>

<main>
    <section class="container-fluid mb-4">
        <div class="carousel slide carousel-dark" data-bs-ride="carousel" data-bs-touch="true" id="promocao">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="http://localhost/exerc%c3%adciosIndividuais/cantina/public/assets/img/Imagem 1.png" alt="Imagem1" class="w-100 d-block">
                </div>
                <div class="carousel-item">
                    <img src="http://localhost/exerc%c3%adciosIndividuais/cantina/public/assets/img/Imagem 2.png" alt="Imagem1" class="w-100 d-block">
                </div>
                <div class="carousel-item">
                    <img src="http://localhost/exerc%c3%adciosIndividuais/cantina/public/assets/img/Imagem 3.png" alt="Imagem1" class="w-100 d-block">
                </div>
            </div>
            <button class="carousel-control-next" data-bs-target="#promocao" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
            <button class="carousel-control-prev" data-bs-target="#promocao" data-bs-slide="prev">
                <span class="carousel-control-prev-icon fs-1"></span>
            </button>
         </div>
    </section>

    <section class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 mb-2">

        {% for produto in produtos %}
            <div class="col g-3">
            {% if produto.quantidade < 10 %}
            <div class="card h-100 bg-danger" data-id="{{ produto.id }}">
            {% else %}
            <div class="card h-100" data-id="{{ produto.id }}">
            {% endif %}
                    <img src="http://localhost/exerc%C3%ADciosIndividuais/cantina/public/assets/img/{{ produto.foto }}" alt="Produto 1" class="card-img-top">
                    <div class="card-body text-center d-flex flex-column">
                        <div class="my-2 d-flex flex-column">
                            <span class="fw-bolder h5">{{ produto.nome }}</span>
                            <span class="me-2">R$ {{ produto.preco }}</span> 
                        </div>
                        
                        
                        {% if user == true %}

                        {% if produto.quantidade < 10 %}
                        <button disabled class="btn btn-dark btn-comprar">Indisponível</button>
                        {% else %}
                        <button class="btn btn-dark btn-comprar">Comprar</button>
                        {% endif %}

                        {% else %}
                        <button onclick="alert('Para efetuar uma compra você tem que estar logado, faça o login!')" class="btn btn-dark">Comprar</button>
                        {% endif %}

                        {% if produto.quantidade < 10 %}
                        <span class="text-light">PRODUTO ESGOTADO</span>
                        {% endif %}
                    </div>
                </div>
            </div>
        {% endfor %}
            </div>
            
        </div>
    
    </section>

</main>

<footer class="container-fluid bg-black d-flex justify-content-around py-5">
    <div class="text-white d-flex flex-column">
        <span class="fw-bold h4">Contato</span>
        <span>19 99934-2783</span>
    </div>
    <div class="text-white d-flex flex-column">
        <span class="fw-bold h4">Localização</span>
        <span>Campinas-Sp, Brasil</span>
        <span>Hortolãndia-Sp, Brasil</span>
    </div>
</footer>




<!---  JAVASCRIPT !-->



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://localhost/exerc%c3%adciosIndividuais/cantina/public/assets/js/modals.js"></script>


<script>
   let produtosJson = [
    {id:1, name:'Ficha de Salgado', img:'salgado.webp', price:6.00},
    {id:2, name:'Pão de Queijo', img:'paoQueijo.jpg', price:3.50},
    {id:3, name:'Açai', img:'acai.jpg', price:12.00},
    {id:4, name:'Mentos de fruta', img:'mentos.jpg', price:2.00},
    {id:5, name:'Halls preto', img:'halls.jpg', price:1.99},
    {id:6, name:'Camisa6', img:'./imagens/camisa-nike6.jpg', price:210.00},
    {id:7, name:'Camisa7', img:'./imagens/camisa-nike7.jpg', price:50.99},
    {id:8, name:'Camisa8', img:'./imagens/camisa-nike8.jpg', price:44.99},
    {id:9, name:'Tenis1', img:'./imagens/tenis-nike1.jpg', price:510.99},
    {id:10, name:'Tenis2', img:'./imagens/tenis-nike2.webp', price:799.00},
    {id:11, name:'Tenis3', img:'./imagens/tenis-nike4.webp', price:899.99},
    {id:12, name:'Tenis4', img:'./imagens/tenis-nike9.jpg', price:800.99}
];


let valorCarrinho = 0;
let carrinho = [];
let quantidadeCarrinho = 0;
let lista = document.querySelector('.ul');
let btnComprar = document.querySelectorAll('.btn-comprar');

// Eventos
btnComprar.forEach((btn) => {
  btn.addEventListener('click', comprar);
});

// Funções
function atualizar() {
  if (quantidadeCarrinho <= 0) {
    document.querySelector('.CarrinhoSemItens').style.display = 'block';
    document.querySelector('.CarrinhoComItens').style.display = 'none';
  } else {
    document.querySelector('.CarrinhoSemItens').style.display = 'none';
    document.querySelector('.CarrinhoComItens').style.display = 'block';
  }
}

function criarItem(produto) {
  const novoItem = document.createElement('li');
  novoItem.classList.add('d-flex', 'align-items-center', 'justify-content-between', 'mb-2');
  novoItem.dataset.itemid = produto.id;

  const imagem = document.createElement('img');
  imagem.src = 'http://localhost/exerc%C3%ADciosIndividuais/cantina/public/assets/img/' + produto.img;
  imagem.style.width = '30%';
  imagem.style.height = '30%';
  novoItem.appendChild(imagem);

  const span = document.createElement('span');
  span.classList.add('h5', 'fw-bolder');
  span.innerHTML = `R$ ${produto.price.toFixed(2)}`;
  novoItem.appendChild(span);

  const div = document.createElement('div');
  div.classList.add('quantidadeItem');

  const divMenos = document.createElement('span');
  divMenos.classList.add('h5', 'fw-bolder', 'menos');
  divMenos.innerHTML = '-';
  divMenos.addEventListener('click', (e) => {
    const quantidadeAtual = parseInt(divQuantidade.innerHTML);
    const itemRemovido = e.target.closest('li');
    quantidadeCarrinho--;
    valorCarrinho -= produto.price;

    if (quantidadeAtual === 1) {
      lista.removeChild(itemRemovido);
    } else {
      divQuantidade.innerHTML = quantidadeAtual - 1;
      span.innerHTML = `R$ ${(produto.price * (quantidadeAtual - 1)).toFixed(2)}`;
    }

    if (quantidadeCarrinho <= 0) {
      document.querySelector('.CarrinhoSemItens').style.display = 'block';
      document.querySelector('.CarrinhoComItens').style.display = 'none';
    }

    document.querySelector('#valorTotal').innerHTML = `R$ ${valorCarrinho.toFixed(2)}`;

    // Atualizar valor da quantidade no campo de entrada
    inputQuantidade.value = parseInt(divQuantidade.innerHTML);
  });
  div.appendChild(divMenos);

  const divQuantidade = document.createElement('span');
  divQuantidade.classList.add('h5', 'fw-bolder', 'mx-2', 'quantidade');
  divQuantidade.innerHTML = 1;
  div.appendChild(divQuantidade);

  const divMais = document.createElement('span');
  divMais.classList.add('h5', 'fw-bolder', 'mais');
  divMais.innerHTML = '+';
  divMais.addEventListener('click', () => {
    const quantidadeAtual = parseInt(divQuantidade.innerHTML);
    const novaQuantidade = quantidadeAtual + 1;
    divQuantidade.innerHTML = novaQuantidade;
    span.innerHTML = `R$ ${(produto.price * novaQuantidade).toFixed(2)}`;
    quantidadeCarrinho++;
    valorCarrinho += produto.price;

    document.querySelector('#valorTotal').innerHTML = `R$ ${valorCarrinho.toFixed(2)}`;

    // Atualizar valor da quantidade no campo de entrada
    inputQuantidade.value = novaQuantidade;
  });
  div.appendChild(divMais);

  valorCarrinho += produto.price;
  document.querySelector('#valorTotal').innerHTML = `R$ ${valorCarrinho.toFixed(2)}`;

  // Criação do campo de entrada (input) com os valores do produto
  const inputProduto = document.createElement('input');
  inputProduto.type = 'hidden';
  inputProduto.name = 'produtos[]';
  inputProduto.value = JSON.stringify({
    id: produto.id,
    img: produto.img,
    name: produto.name,
    price: produto.price
  });
  novoItem.appendChild(inputProduto);

  // Criação do campo de entrada (input) com a quantidade do produto
  const inputQuantidade = document.createElement('input');
  inputQuantidade.type = 'hidden';
  inputQuantidade.name = 'quantidades[]';
  inputQuantidade.value = parseInt(divQuantidade.innerHTML);
  novoItem.appendChild(inputQuantidade);

  novoItem.appendChild(div);
  return novoItem;
}   

function comprar(e) {
  alert('Adicionado ao carrinho');
  const botao = e.target;
  const card = botao.closest('.card');
  const idProduto = card.dataset.id;
  quantidadeCarrinho++;
  atualizar();

  const produto = produtosJson.find((produto) => produto.id == idProduto);
  carrinho.push(produto);

  const novoItem = criarItem(produto);
  lista.appendChild(novoItem);
}

atualizar();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>