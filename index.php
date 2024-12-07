<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <title>Barbearia do Janderson</title>
</head>

<body>
    <header> 
        <h1>JM Barbearia</h1>
    </header>

    <?php include 'notificacao.php'; notificacao( );?>
    
    <nav id="navegacao">
        <ul>
            <li><a href="#historico">Histórico</a></li>
            <li><a href="#missao">Missão</a></li>
            <li><a href="#visao">Visão</a></li>
            <li><a href="#valores">Valores</a></li>
            <li><a href="#servicos">Serviços</a></li>
            <li><a href="#contato">Contatos</a></li>
        </ul>
    </nav>

    <section id="historico" class="first-section">
        <h1>Histórico</h1>
        <p> Uma barbearia que existe desde a década de 70, atuando no bairro do Cocaia em Guarulhos,
            promovendo serviços de cuidado com cabelos e barba.
        </p>
    </section>

    <section id="missao" >
        <h1>Missão</h1>
        <p>Oferecer uma experiência única e personalizada de cuidados masculinos, proporcionando cortes de cabelo e serviços de barbearia de alta qualidade, 
        em um ambiente acolhedor e descontraído, onde cada cliente se sinta valorizado e confiante. </p>
    </section>

    <section id="visao" >
        <h1>Visão</h1>
        <p>Ser reconhecida como a barbearia de referência na região, conhecida por sua excelência em serviços, inovação e atendimento ao cliente, 
        promovendo a cultura de cuidados masculinos e contribuindo para a autoestima dos nossos clientes. </p>
    </section>

    <section id="valores">
        <h1>Valores</h1>
        <p>Qualidade: Comprometemo-nos a oferecer serviços de alta qualidade, utilizando produtos e técnicas que atendam às expectativas dos nossos clientes. </p>
        <p>Respeito: Respeitando as individualidades e preferências criando um ambiente inclusivo e acolhedor. </p>
        <p>Inovação: Buscamos constantemente atualizar nossas técnicas e serviços, trazendo as últimas tendências do mundo da barbearia para nossos clientes. </p>
        <p>Profissionalismo: Atuamos com ética e responsabilidade, garantindo que nossa equipe esteja sempre bem treinada e preparada para oferecer o melhor atendimento. </p>
    </section>
    
    <section id="servicos" class="last-section">
        <div>
            <h1>Serviços</h1>   
            
            <?php 
                include 'database.php';

                $result = coletaServicos();
                    
                if( $result->num_rows > 0 ):
                    while( $servico = $result->fetch_assoc() ):
                ?>
                <p><?php echo $servico['nome'] ?> R$ <?php echo number_format($servico['preco'], 2, ",", "." ) ?></p>
                <?php endwhile; endif;?>
        </div>
        <div>
            <h2> Horários de atendimento</h1>
            <p>Segunda-feira  08:00 - 17:00</p>
            <p>Terça-feira  08:00 - 17:00</p>
            <p>Quarta-feira  08:00 - 17:00</p>
            <p>Quinta-feira  08:00 - 17:00</p>
            <p>Sexta-feira  08:00 - 17:00</p>
            <p>Sábado  08:00 - 18:00</p>
            <p>Domingo  08:00 - 12:00</p>
        </div>
    </section>


    <footer>        
        <h1>Contatos</h1>

        <section id="contato" class="contato">
            <div class="mandar-mensagem">
                <h1>Mande sua mensagem!</h1>
                <form action="mensagem.php" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome">
                    
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email">
                    
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone">
                    
                    <label for="mensagem">Mensagem:</label>
                    <textarea name="mensagem" id="mensagem"></textarea>
                    
                    <input type="submit" class="botao" value="Enviar">
                </form>
            </div>

            <div  class="dados-contato">
                <div class="contatos">
                    <ul>
                        <li><span>Telefone <a href=" https://api.whatsapp.com/send?phone=558582219849">+55 95 8221-9849</a></span></li>
                        <li><span>E-mail </span><a href="mailto:janderson.moura@aluno.ifsp.edu.br">janderson.moura@aluno.ifsp.edu.br</a></li>
                        <li><span>Instagram <span class="mdi mdi-instagram"></span> <a href="https://www.instagram.com/janderssonbarber/">@janderssonbarber</a></span></li>
                    </ul>
                </div>
                <div class="mapa">
                    <iframe class="contato_mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d228.80345981096133!2d-46.52164079654827!3d-23.429591636675774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef4d6977e6dd5%3A0x9b8274d884371d4f!2sAv.Brigadeiro%20Faria%20Lima%2C%202919%20-%20Vila%20Cocaia%2C%20Guarulhos%20-%20SP%2C%2007130-000!5e0!3m2!1spt-BR!2sbr!4v1733514465049!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            
                </div>
            </div>
        </section>
        
        <a href="login.php"><span class="mdi mdi-account"></span></a>
    </footer>

</body>
</html>