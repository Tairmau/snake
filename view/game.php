<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../images/snake.png">
    <title>Snake game</title>
</head>
    <body>
        <h1>Snake</h1>
        <form id="firstform" action="index.php?uc=accueil&action=updatescore" method="POST">
            <h4>score : <p id="score" name="score">0</p></h4>
            <canvas id="board"></canvas>
            <button id="restart" type="submit">RESTART</button>
        </form>

