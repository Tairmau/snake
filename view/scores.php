<div class="bestscores">
    <table>
        <tr>
            <th>Identifiant</th>
            <th>Scores</th>
        </tr>


        <tr>
            <?php 
                $pdo = PdoSnake::getPdoSnake();
                $allscores = $pdo->afficherScores();

                foreach ($allscores as $singlescore) {
                    echo "<tr>";
                    echo "<td>" . $singlescore['identifiant'] . "</td>";
                    echo "<td>" . $singlescore['scores'] . "</td>";
                    echo "</tr>";
                }
            ?>
    </table>
</div>