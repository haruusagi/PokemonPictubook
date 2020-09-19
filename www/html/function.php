<?php
//HTMLエンティティ化
function h($s){
    echo htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
/*APIを叩いてポケモンの情報を配列に格納*/
function getPokemonInfo($num){
    $url = "https://pokeapi.co/api/v2/pokemon/{$num}/";
    $pokemon = json_decode(file_get_contents($url));
    if ($url === NULL) {
        echo "データがないよ";
        return;
    }else{
    /*id,名前,基本経験値,高さ取得 */
        $pokemonInfo  = [
            "id" => $pokemon->id,
        ];
        return $pokemonInfo;
    }
}


function PDO(){
    /*DB接続*/
    $dsn = 'mysql:host=db;dbname=pokemon;charset=utf8mb4';
    $username = 'root';
    $password = 'secret';
    $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
    );
    try {
        $pdo = new PDO($dsn, $username, $password, $options);
        $result = $pdo->query('select * from data');

        foreach($result as $row) {
        echo "No.{$row['no']}<br>";
        echo "NAME : {$row['name']}<br>";
        echo "LV : {$row['LV']}<br>";
        echo '<br>';
        }
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}