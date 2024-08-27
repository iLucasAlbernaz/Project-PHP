<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>CS Shops</title>
    <link rel="stylesheet" href="CSS/site.css">
</head>
    <body>
        <header>
        <div class="container">
                <div class="logo">
                    <a href="#"><img src="IMG/logo.png.jpeg" alt="CS SHOPS"></a>
                </div>
                    <nav>
                        <ul>
                            <li><a href="site.php"><i class="fas fa-home"></i> Início</a></li> 
                            <li><a href="CLIENTE/perfilCliente.php"><i class="fas fa-user-plus"></i> Perfil</a></li>
                            <li><a href="ENDERECO/visualizarEnderecos.php"><i class="fas fa-home"></i> Endereço</a></li>
                            <li><a href="CLIENTE/logout.php"><i class="fas fa-user-plus"></i> Sair</a></li>
                            <li><a href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a></li>
                            <li><a href="pedido.php"><i class="fas fa-tag"></i> Pedidos</a></li>
                    </ul>
                </div>
        </header>
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Pesquisar por nome de produto">
        <button onclick="searchProducts()">Pesquisar</button>
    </div>
    <script>
        
        function searchProducts() {
            let searchText = document.getElementById('searchInput').value.toLowerCase();   
            let products = document.querySelectorAll('.product');
            products.forEach(product => {
                let productName = product.querySelector('h3').innerText.toLowerCase();    
                if (productName.includes(searchText)) {      
                    product.style.display = 'block';
                } else {    
                    product.style.display = 'none';
                }
            });
        }
        function addToCart(productName, productPrice) {     
            alert('Produto adicionado ao carrinho!');
        }
    </script>
</html>