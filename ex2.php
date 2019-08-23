<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Formulário Nomes</title>
</head>
<body>
    <form action="ex2insertPDO.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h2>Dê suas informações:</h2></td>
            </tr>
            <tr>
                <td><p>Digite o seu nome:</p></td>
                <td><input type="text" name="nome" size="30" maxlength="30" /></td>
            </tr>
            <tr>
                <td><p>Digite sua idade</p></td>
                <td><input type="text" name="idade" size="30" maxlength="30" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Enviar" /></td>
            </tr>
        </table>
    </form>        
</body>
</html>