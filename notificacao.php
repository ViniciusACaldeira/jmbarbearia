
<?php
    
    function formataNotificacao( $status, $mensagem )
    {
        return "?status=$status&notificacao=$mensagem";
    }

    function notificacao( )
    {
        if( !isset($_GET['status']) || !isset($_GET['notificacao']) )
        return;
        
        $status = $_GET['status'];
        $notificacao = $_GET['notificacao'];
        
        if( $status !== null && $notificacao != null ):
            ?>
            <link rel="stylesheet" href="toaster.css">
            <div id="notificacao" class="">
                <?php echo $notificacao ?>
            </div>
            <script>
                function exibicaoNotificacao( ) { 
                    let notificacao = document.getElementById("notificacao");
                    notificacao.className = "<?php echo $status?>" + " show";

                    setTimeout(function () { notificacao.className = notificacao.className.replace("show", "") }, 3000);
                };
                exibicaoNotificacao();
            </script>
        <?php endif;
    }
?>