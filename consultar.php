<?php
include "Itaucripto.php";
$cripto = new Itaucripto();

//configuracoes
$codEmp ="Cod empresa";
$chave="Chave da empresa";

//pega o cpf/cnpj
$fiscal=preg_replace('/\D/', '', $_POST['fiscal']);

//gera o dc 
$dc = $cripto->geraCripto($codEmp,$fiscal,$chave);
?>
<HTML>
<head>
<script language="JavaScript">
	function Enviar(NomeDoForm){
	   document.forms[NomeDoForm].submit();
	}
</script>
</head>
<body onload="Enviar('itau')">
<FORM ACTION='https://ww2.itau.com.br/2viabloq/pesquisa.asp' METHOD='Post' name='itau'>
	<INPUT type=hidden name=DC value="<?php echo $dc;?>">
	<INPUT type=hidden name=msg value="S">
</form>
</BODY>
</HTML>