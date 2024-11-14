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
			function carregar_main()
			{
				
			}
            /*function Excluir()
			{
				var psw = document.getElementById("senha_psw").value;
				var psw_conf = document.getElementById("conf_psw").value;
				if(psw != psw_conf)
				{
					alert("A senha está incorreta!"+psw+" "+psw_conf);
					document.getElementById("login_btn").disabled=true;
				}
				else
				{
					document.getElementById("login_btn").disabled=false;
				}
			}*/
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

                            if (isset($_POST['usuario_mod']) && isset($_POST['senha_mod']))
                            {
                                $usu_mod = $_POST['usuario_mod'];
                                $psw_mod = $_POST['senha_mod'];
                                $sql = 'SELECT * FROM moderador WHERE login_mod="'.$usu_mod.'" AND psw_mod="'.$psw_mod.'"';
                                $rs = mysql_query($sql) or die('Query erro : ' . mysql_error());
                                $qtd_linhas = mysql_num_rows($rs);
                                if ($qtd_linhas != 0)
                                {
                                    echo "<br>Bem vindo ".$usu_mod.".<br><br>";
                                    $sqlSelect = 'select * from usuario';
                                    $rsSelect = mysql_query($sqlSelect) or die('Query erro : ' . mysql_error());

                                    $qtd_linhasSelect = mysql_num_rows($rsSelect);
                                    if ($qtd_linhasSelect != 0)
                                    {
                                        //SE TIVER REGISTROS
                                        $conta_linhaSelect=0;

                                        echo "<h3 align='center'>Quantidade de cadastros: $qtd_linhasSelect\n</h3><hr/>\n";
                                        echo "<br>";

                                        do
                                        {
                                            //echo "<insert type=\"button\" name=\"excluir_".id_user."\ onclick=\"Excluir()\" value=\"Excluir usuário\">";
                                            echo mysql_result($rsSelect,$conta_linhaSelect,'id_user')." - ";
                                            echo mysql_result($rsSelect,$conta_linhaSelect,'nome')." - ";
                                            echo mysql_result($rsSelect,$conta_linhaSelect,'sobrenome')." - ";
                                            echo mysql_result($rsSelect,$conta_linhaSelect,'data_nasc')." - ";
                                            echo mysql_result($rsSelect,$conta_linhaSelect,'sexo')." - ";
                                            echo mysql_result($rsSelect,$conta_linhaSelect,'log')." - ";
                                            echo mysql_result($rsSelect,$conta_linhaSelect,'email_user')." - ";
                                            echo mysql_result($rsSelect,$conta_linhaSelect,'psw_user');
                                            $conta_linhaSelect++;
                                            echo "<br><br>";
                                        }
                                        while( $conta_linhaSelect<$qtd_linhasSelect);
                                        }
                                        else
                                        {
                                            //SE NÃO TIVER
                                            echo "Nenhum registro foi encontrado!!<br>";
                                        }
                                
                                        echo "<a href=\"0Main_Page.html\" style=\"color: white;\"><input type=\"button\" class=\"botao\" Value=\"Voltar para página inicial.\"></a><br><br>";
                                    }
                                else
                                {
                                    echo "<br>Login não encontrado";
                                }
                            }
                            else
                            {
                                echo "<br>Campo(s) vazio.";
                            }

    			            mysql_close($conn);
                        ?>
                    </section>
                </section>
            </section>
            <br>
            <br>
            <!-- CRÉDITOS -->
            <footer id="creditos">
                <p>Desenvolvido por: Danilo Pereira, Fernando Fernandes, João Henrique, Luiz Eduardo e Vitor Alves.</p>
            </footer>
        </center>
        <br>
    </body>
</html>