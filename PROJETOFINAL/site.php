<?php require_once "CABECALHO/cabecalho.php" ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <script>
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            function addToCart(productName, productPrice) {
                const existingProduct = cart.find(item => item.name === productName);
                if (existingProduct) {
                    existingProduct.quantity++;
                } else {
                    cart.push({ name: productName, price: productPrice, quantity: 1 });
                }
                localStorage.setItem('cart', JSON.stringify(cart));
                alert('Produto adicionado ao carrinho!');
            }
        </script>
    </head>
    <body>
        <div>
            <section class="hero">
                <div class="container">
                    <h1 style="color: black;">Descubra os melhores relógios para você</h1>
                    <p style="color: black;">Encontre uma grande variedade de estilos e marcas na CS Shops.</p>
                   
                </div>
            </section>
            <section class="featured-products">
                <div class="container">
                    <h2>Relógios em Destaque</h2>
                    <br>
                    <div class="product-grid">
                        <div class="product">
                            <img src="IMG/r1.jpg">
                            <h3>Navigator</h3>
                            <p>Elegância clássica para o homem moderno.</p>
                            <p class="price">R$ 299,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Navigator', 299.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r6.jpg">
                            <h3>Luminosa Glamour</h3>
                            <p>Caixa leve, resistente e compacta.</p>
                            <p class="price">R$ 199,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Luminosa Glamour', 199.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r4.jpg" alt="Relógio Esportivo Unissex">
                            <h3>Adrenaline Pro</h3>
                            <p>Estilo robusto, funcionalidade superior.</p>
                            <p class="price">R$ 149,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Adrenaline Pro', 149.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r7.jpg" alt="Relógio de Luxo">
                            <h3>Éclat Majestique</h3>
                            <p>Elegância atemporal, artesanato meticuloso.</p>
                            <p class="price">R$ 999,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Éclat Majestique', 999.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r5.jpg" alt="Relógio Digital Feminino">
                            <h3>Luminosa Glamour</h3>
                            <p>Caixa leve, resistente e compacta.</p>
                            <p class="price">R$ 199,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Luminosa Glamour', 199.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r3.jpg" alt="">
                            <h3>Glamour Radiante</h3>
                            <p>Design sofisticado e elegante, perfeito para qualquer ocasião.</p>
                            <p class="price">R$ 179,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Glamour Radiante', 179.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r8.png" alt="">
                            <h3>Estrela do Tempo</h3>
                            <p>Caixa delicada e resistente em aço inoxidável.</p>
                            <p class="price">R$ 199,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Estrela do Tempo', 199.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r2.jpg" alt="">
                            <h3>Brilho Celestial</h3>
                            <p>Caixa fina e leve, perfeita para uso diário.</p>
                            <p class="price">R$ 249,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Brilho Celestial', 249.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r9.jpeg" alt="">
                            <h3>Diamante Radiante</h3>
                            <p>Caixa robusta e luxuosa em titânio.</p>
                            <p class="price">R$ 349,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Diamante Radiante', 349.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r10.jpeg" alt="">
                            <h3>Horizonte Encantado</h3>
                            <p>Caixa elegante e ergonômica, projetada para o conforto.</p>
                            <p class="price">R$ 399,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Horizonte Encantado', 399.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r11.jpeg" alt="">
                            <h3>Harmonia Celeste</h3>
                            <p>Caixa delicada e refinada em aço inoxidável.</p>
                            <p class="price">R$ 299,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Harmonia Celeste', 299.90)">Comprar</button>
                        </div>
                        <div class="product">
                            <img src="IMG/r12.jpeg" alt="">
                            <h3>Rubi Resplandecente</h3>
                            <p> Caixa elegante e resistente em cerâmica de alta qualidade.</p>
                            <p class="price">R$ 499,90</p>
                            <button class="btn btn-buy" onclick="addToCart('Rubi Resplandecente', 499.90)">Comprar</button>
                        </div>
                    </div>
                </div>
            </section>

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
        </div>
    </body>
</html>
