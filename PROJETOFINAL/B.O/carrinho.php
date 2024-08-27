<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>CS Shops</title>
    <link rel="stylesheet" href="CSS/site.css">
    <link rel="stylesheet" href="CSS/carrinho.css">
    
</head>
    <body class="body3">
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
        
</body>
</html>
    <head class="head1">
        <script>
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            function removeFromCart(productName) {
                const productIndex = cart.findIndex(item => item.name === productName);
                if (productIndex !== -1) {
                    cart[productIndex].quantity--;
                    if (cart[productIndex].quantity === 0) {
                        cart.splice(productIndex, 1);
                    }
                }
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCart();
            }

            function updateCart() {
                let cartItems = document.getElementById('cart-items');
                let cartTotal = document.getElementById('cart-total');
                cartItems.innerHTML = '';
                let total = 0;
                cart.forEach(item => {
                    let itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    cartItems.innerHTML += `
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.price.toFixed(2)}</td>
                            <td>${item.quantity}</td>
                            <td>${itemTotal.toFixed(2)}</td>
                            <td><button onclick="removeFromCart('${item.name}')">Remover</button></td>
                        </tr>
                    `;
                });
                cartTotal.innerText = total.toFixed(2);
            }

            function finalizePurchase() {
                cart = [];
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCart();
                document.getElementById('message').style.display = 'block';
            }

            window.onload = function() {
                updateCart();
            };
        </script>
    </head>
    <body class="body2">
     <center> <div class="container2">
             <h2 class="h22">Carrinho de Compras</h2>
             <br>
            <table class="perfil">
                <thead>
                    <tr class="tr1">
                        <th class="th1">Produto</th>
                        <th class="th1">Preço</th>
                        <th class="th1">Quantidade</th>
                        <th class="th1">Total</th>
                        <th class="th1">Ação</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                
                </tbody>
            </table>
            <p>Total: R$ <span id="cart-total">0.00</span></p><br>
            <button onclick="finalizePurchase()">Finalizar Compra</button>
            <div class="message" id="message">Compra finalizada com sucesso!</div>

<script>
    function finalizePurchase() {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "pedido.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.body.innerHTML = xhr.responseText;
            }
        };
        xhr.send("cart=" + encodeURIComponent(JSON.stringify(cart)));
        
       
        cart = [];
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    }
</script>

        </div></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <footer>
            <div class="container">
                <div class="footer-links">
                    <a href="#">Quem Somos</a>
                    <a href="#">Política de Privacidade</a>
                    <a href="#">Termos de Uso</a>
                    <a href="#">Contato</a>
                </div>
                <br>
                <div class="social-media">
                    <a href="https://www.facebook.com/?locale=pt_BR"><img src="IMG/FACEBOOK.png" alt="Facebook"></a>
                    <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoicHQifQ%3D%3D%22%7D"><img src="IMG/TWITTER.png" alt="Twitter"></a>
                    <a href="https://www.instagram.com/"><img src="IMG/INSTAGRAM.jpg" alt="Instagram"></a>
                </div>
            </div>
        </footer>
    </body>
</html>
