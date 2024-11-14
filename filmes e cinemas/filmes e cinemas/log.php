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

                            if (isset($_POST['usuario']) && isset($_POST['senha']))
                            {
                                $usuU = $_POST['usuario'];
                                $pswU = $_POST['senha'];
                                $sqlU = 'SELECT * FROM usuario WHERE log="'.$usuU.'" AND psw_user="'.md5($pswU).'"';
                                $rsU = mysql_query($sqlU) or die('Query erro : ' . mysql_error());
                                $qtd_linhasU = mysql_num_rows($rsU);
                                if ($qtd_linhasU != 0)
                                {
                                    echo "<br>Bem-vindo ".$usuU.".<br><br>";
                                    
                                    $_SESSION['prt'] = $usuU;

                                    $sql = "Select * from usuario where log = '".$_SESSION['prt']."'";
                                    $rs = mysql_query($sql);
  
                                    if($linha = mysql_fetch_array($rs))
                                    {
                                        echo "<table border=0>";
                                        echo "<form action='confirmar_alt.php?Id=".$linha["log"]."' onsubmit='return verificar()' method='post' name='dados'>";
                                        echo "<tr>";
                                        echo "<td colspan='4' height='40' align= 'center'>";                                       
                                        echo "<font color='white'>Usuário : ".$linha["log"]." - ID : <input type=\"text\" name=\"id\" value=".$linha["id_user"]." readonly>";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "<tr height='40'>";
                                        echo "<td>";
                                        echo "<font color='white'>Nome : <td><input type='text' name='nome' id='nome' size='30' value='".$linha["nome"]."' required> </input></td>";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<font color='white'>Sobrenome : <td><input type='text' name='sobrenome' id='sobrenome' size='30' value=".$linha["sobrenome"]."  placeholder='F ou M' required> </input></td>";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "<tr height='40'>";
                                        echo "<td>";
                                        echo "<font color='white'>Data de nascimento : <td><input type='date' name='data' id='data_date' size='30' value=".$linha["data_nasc"]." required></input></td>";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<font color='white'>Sexo : <td><input type='text' name='sexo' id='sexo' size='30' value=".$linha["sexo"]."  placeholder='F ou M' required> </input></td>";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "<tr height='40'>";
                                        echo "<td>";
                                        echo "<font color='white'>E-mail : <td><input type='email' name='email' id='email' size='30' placeholder='Example@email.com' class='form-group' value=".$linha["email_user"]." required> </input></td>";
                                        echo "</td>";
                                        echo "<td>";
                                        //echo "<font color='white'>Senha: <td><input type='text' name='senha' id='senha' size='30' class='form-group' value=".$linha["psw_user"]." readonly> </input></td>";
                                        echo "<font color='white'>Senha : <td><input type='text' name='senha' id='senha' size='30' class='form-group'> </input></td>";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td colspan='2' align='center'>";
                                        echo "<input type='button' class='botao' value='Voltar' onclick='javascript:history.back()'>";
                                        echo "</td>";
                                        echo "<td colspan='2' align='center'>";
                                        echo "<input type='submit' class='botao' value='Confirmar Edição'>";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "</form>";                                        
                                        echo "</table><br><br>";
                                    }
                                    else
                                    {
                                        echo "Aluno não cadastrado.";
                                        echo "<hr>";
                                        echo "<input type='button' value='Voltar' onclick='javascript:history.back()'>";
                                    }
                                    echo "<hr style=\"background-color: #ffaa00;\"><br>";
                                    echo "<form action=\"del_user.php\" method=\"post\">";
                                    echo "Pressione o botão abaixo para excluir a conta: ".$linha["log"]." - ID : <input type=\"text\" name=\"id\" value=".$linha["id_user"]." readonly><br><br><br>";
                                    echo "<br>";
                                    echo "<a href=\"del_user.php\"><input type=\"submit\" name=\"excluir\" id=\"excluir_btn\" value=\"EXCLUIR PERMANENTEMENTE\" class=\"botao\" onclick=\"confirmar()\"></a><br><br>";
                                    echo "</form>";


                                    echo "<a href=\"0Main_Page.html\" style=\"color: white;\"><input type=\"button\" class=\"botao\" Value=\"Página Inicial.\"></a><br><br>";
                                    define('IN_PHPBB', true);
                                }
                                else
                                {
                                    echo "Combinação incorreta!<br><br>";
                                    echo "<a href=\"0Main_Page.html\" style=\"color: white;\"><input type=\"button\" class=\"botao\" Value=\"Voltar para página inicial.\"></a><br><br>";
                                }
                            }
                            else
                            {
                                echo "Campo(s) vazio.<br>";
                                echo "<a href=\"0Main_Page.html\" style=\"color: white;\"><input type=\"button\" class=\"botao\" Value=\"Voltar para página inicial.\"></a><br><br>";
                            }
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
