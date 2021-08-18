<!DOCTYPE html>
<html>
<head>
	<title>B2B Woodytoys</title>
    <style>
        label {font-size: 120%; color: dimgray; }
        legend {font-size: 120%; color: dimgray; }
        #produits {width: 30%; margin-left: 2%; margin-top: 5%;}
        #head {font-size: 200%; color:cadetblue; font-family: 'Times New Roman', Times, serif;padding-left: 2%}
        body {background-color: cornsilk;}
        footer {font-size: 120%; font-family: 'Times New Roman', Times, serif; position: fixed; bottom: 0; right: 1%;}
    </style>
    <script>
        const prix = ["0", 5, 3, 4, 7, 702];

        function changePrix(){
            document.getElementById("prix").innerHTML = "Prix: " + prix[document.getElementById("nom").value] * document.getElementById("quant").value;
        }

    </script>
</head>
<body>
    <header><p id="head">Bienvenue! Vous trouverez ici nos différents produits.</p></header>
    <section>
        <div id="produits">
            <form method="post" action="index.php" id="formA">
                <fieldset>
                    <legend id="prix">Prix: 5</legend>
                    <label>Produit: <input onchange="changePrix()" type="number" id="nom" name="nom" min="1" max="5" value="1" required></label>
                    <label>Quantité: <input onchange="changePrix()" type="number" id="quant" name="quant" min="1" value="1" required></label>
                    <input type="submit" name="submit" onsubmit="achat()" value="Acheter">
                </fieldset>
            </form>
			<p id="achat"></p>
        </div>
    </section>
    <footer>Groupe M1-6</footer>
	<?php

        $nom = "produit" . htmlentities(isset($_POST["nom"]));
        $quant = htmlentities(isset($_POST["quant"]));

        if( isset($_POST['submit'])) {
                try {
                    $conn = new mysqli("bb803920-001.dbaas.ovh.net:35762","superUser","Nimda222", "mysqlAdmin1");
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "INSERT INTO tb_commande (nom, quant)
                    VALUES ('$nom', '$quant')";

                    if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    } else {
						echo "something went wrong\n";
						#echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                }
                catch (Exception $e)
                {
                    echo "something went wrong\n";
                }
        }
	?>
</body>
</html>