<!DOCTYPE html>
<head>
<link rel="stylesheet" href="main.css">
  <title>ポケモン図鑑はるうさぎ版</title>
</head>
<body>
  <h1>ポケモン図鑑</h1>
  <h2><a href="https://twitter.com/_harusa_p">@_harusa_p</a></h2>
<table>
<thead>
<tr>
  <th class="ID">ID</th>
  <th>アイコン</th>
  <th>名前</th>
</tr>
<thead>
<tbody>
<?php 
for($num = 1; $num <10; $num++){
  $url = "https://pokeapi.co/api/v2/pokemon/{$num}/";
  $pokemon = json_decode(file_get_contents($url));
  if ($url === NULL) {
    echo "データがないよ";
    return;
  }else{
    if($num < 10){
      $imageNum = '00';
    }else if($num < 100){
      $imageNum = '0';
    }else{
      $imageNum = '';
    }
      $pokemonID  =  $pokemon->id;
      $pokemonImage = $imageNum.$pokemonID;
      $pokemonName = $pokemon->name;?>
        <tr>
            <td class="ID"><?= $pokemonID ?></td>
            <td class="icon"><img src="/images/<?= $pokemonImage?>.png"></img></td> 
            <td><?= $pokemonName?></td>
        </tr>
  <?php } ?>
<?php } ?>
</tbody>
</table>
</body>
</html>


<?php

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
            "name" => $pokemon->name,
        ];
        return $pokemonInfo["id"];
    }
}