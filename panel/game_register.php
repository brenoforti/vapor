<?php 

require('./modules/connection.php');

$name = $_POST['name'] ?? null;
$price = $_POST['price'] ?? null;
$image_url = $_POST['image_url'] ?? null;
$video_url = $_POST['video_url'] ?? null;
$release_date = $_POST['release_date'] ?? null;
$developer = $_POST['developer'] ?? null;
$category = $_POST['category'] ?? null;
$description = $_POST['description'] ?? null;

$game_search = "SELECT * FROM jogo WHERE nome = '{$game}'";
$game = mysqli_query($conn, $game_search);

if ($game->num_rows > 0) {
    header('location: game_add.php?error=This game is already registered');
} else {

    $video_add_jogo_query = "INSERT INTO jogo (nome, valor, descricao, imagem_url, video_url, data_lancamento, desenvolvedora, id_categoria) VALUES ('{$name}', {$price}, '{$description}', '{$image_url}', '{$video_url}', '{$release_date}', '{$developer}', {$category})";
    $novideo_add_jogo_query = "INSERT INTO jogo (nome, valor, descricao, imagem_url, data_lancamento, desenvolvedora, id_categoria) VALUES ('{$name}', {$price}, '{$description}', '{$image_url}', '{$release_date}', '{$developer}', {$category})";
    
    if ($video_url == "") {
        mysqli_query($conn, $novideo_add_jogo_query);
    } else {
        mysqli_query($conn, $video_add_jogo_query);
    }
    
    header('location: game.php');
}




?>