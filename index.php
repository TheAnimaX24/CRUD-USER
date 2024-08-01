<?php
require_once './db/connexion.php';

$codeSQL = $db->prepare("SELECT * FROM utilisateurs");
$codeSQL->execute();
$nbLinges = $codeSQL->rowCount();
$tableauRequete = $codeSQL->fetchAll(PDO::FETCH_ASSOC);
print_r($tableauRequete);
?>

</head>

<body>
    <main>
        <table>


            <table border="1">
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        nom
                    </td>
                    <td>
                        prnom
                    </td>
                    <td>
                        email
                    </td>
                    <td>
                        code postal
                    </td>
                    <td>
                        Action
                    </td>
<td>
    modifé
</td>
                </tr>
                <?php

                foreach ($tableauRequete as $key => $value) {
                ?>
                    <tr>
                        <?php
                        if (isset($_GET['modifyId']) && $_GET['modifyId'] == $value['id']) {
                            echo("<form method ='POST' action='./modifyUser.php'>");
                            echo ("<td><input type='text' value = '".$value["nom"] ."'name='modifName'></td>");
                            echo ("<td><input type='text' value = '".$value["prenom"] ."'name='modifFname'></td>");
                            echo ("<td><input type='text' value = '".$value["email"] ."'name='modifEmail'></td>");
                            echo ("<td><input type='text' value = '".$value["code_postal"] ."'name='modifCP'></td>");
                            echo ("<input type='hidden' value = '".$value["id"] ."'name='id'>");
                            echo ("<td><button>Valider</button></td");
    
                       
                            echo('</form>');
                        }else{
                            echo ("<td>" . $value["id"] . "</td>");
                            echo ("<td>" . $value["nom"] . "</td>");
    
    
                            echo ("<td>" . $value["prenom"] . "</td>");
    
                            echo ("<td>" . $value["email"] . "</td>");
    
    
                            echo ("<td>" . $value["code_postal"] . "</td>");
                            echo ("<td><a href='./removeUser.php?id=".$value['id']."'>Supprimer</a></td>");
                            echo("<td> <a href='./index.php?modifyId=" .$value['id']."'>moddifi</a></td>");
                        }
                     
                        ?>

                    </tr>

                <?php
              
                }
                ?>

            </table>

        </table>

        <form action="./adduser.php" method="POST">
            <label for="">NOM</label>
            <input name="nom" id="nom" type="text">
            <label>prenom </label>
            <input name="prenom" id="prenom" type="text">
            <label>email </label>
            <input name="email" id="email" type="text">
            <label>code postale </label>
            <input name="code postal" id="code postal" type="text">
            <button>
                Valider
            </button>
        </form>
    
    </main>
</body>

</html>