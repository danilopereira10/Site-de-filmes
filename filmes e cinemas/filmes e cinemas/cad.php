<html>
    <head>
        <meta charset="utf-8">
        <title>CineOscar</title>
        <link rel="Stylesheet" type="text/css" href="CSS/Estilos.css">
        <link rel="Stylesheet" type="text/css" href="CSS/Normalize.css">
        <link rel="Stylesheet" href="Bootstrap Local/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:400,700|Pacifico' rel='stylesheet' type='text/css'>
		<script src="https://code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
		<script type="text/javascript">
			function carregar_pag(pag)
			{
				$("#resto").load(pag);
			}
		</script>
    </head>
    <body style="background-color: black;">
        <!--<input type="text" class="form-group">-->
        <center>
            <br>
            <!-- NAVEGAÇÃO -->
            <section id="navig">
                <a href="0Main_Page.html">CineOscar</a>
            </section>
			<br>
			<!-- CABEÇALHO -->
            <header>
                <h1>CineOscar</h1>
                <p>O Universo Cinematográfico na palma de sua mão!!</p>
                <br>
            </header>
            <br><br>
            <section id="corpo">
                <section id="resto" style="padding: 0 30px; color: white;">
                    <section id="resto_php" style="border-style: solid; border-color: #ffaa00;">
                        <?php
                            $local_server = "localhost";            // local do servidor
                            $usuario_server = "root";               // nome do usuario
                            $senha_server = "";                     // senha
                            $banco_de_dados = "cadastro_cinema";    // nome do banco de dados
                            $conn = @mysql_connect($local_server,$usuario_server,$senha_server) or die ("O servidor não responde!");
                            // conectar-se ao banco de dados
                            $db = @mysql_select_db($banco_de_dados,$conn) or die ("Não foi possivel conectar-se ao banco de dados!");

                            $nm_usu = $_POST["nome"];
                            $snm_usu = $_POST["sobrenome"];
                            $dt_usu = $_POST["data"];
                            $sx_usu = $_POST["sexo"];
                            $usu_usu = $_POST["usuario"];
                            $email_usu = $_POST["email"];
                            $psw_usu = $_POST["senha"];

                            echo '<br>Exibir: "'.$nm_usu.'","'.$snm_usu.'","'.$dt_usu.'","'.$sx_usu.'","'.$usu_usu.'","'.$email_usu.'" ('.md5($psw_usu).')';
                            echo "<br><br>Cadastro efetuado com sucesso!<br><br>";
                            echo "<a href=\"0Main_Page.html\" style=\"color: white;\"><input type=\"button\" class=\"botao\" Value=\"Voltar para página inicial.\"></a><br><br>";

                            $inserir = 'INSERT INTO usuario(id_user, nome, sobrenome, data_nasc, sexo, log, email_user, psw_user) VALUES (DEFAULT, "'.$nm_usu.'","'.$snm_usu.'","'.$dt_usu.'","'.$sx_usu.'","'.$usu_usu.'","'.$email_usu.'","'.md5($psw_usu).'")';
                            $ms_inserir = mysql_query($inserir) or die('Query erro : ' . mysql_error());
            
                            mysql_close($conn);
                        ?>
                    </section>
                </section>
            </section>
            <br><br>
            <!-- CRÉDITOS -->
            <footer id="creditos">
                <p>Desenvolvido por: Danilo Pereira, Fernando Fernandes, João Henrique, Luiz Eduardo e Vitor Alves.</p>
            </footer>
        </center>
        <br>
    </body>
</html>