<?php

$musicDir = scandir("music");
$listSongs = array();
$extensions = '/(.flac|.mp3)/';

$artistSong = array();
$nameSong = array();

$count = 0;
foreach($musicDir as $song){
    if(preg_match($extensions, strtolower($song))){
      $listSongs[] = $song;
    
      $nameSong[$count] = strstr($song,'-');
      $nameSong[$count] = str_replace('- ', '', $nameSong[$count]);
      $nameSong[$count] = str_replace('.mp3', '', $nameSong[$count]);
      $nameSong[$count] = str_replace('.flac', '', $nameSong[$count]);
      $artistSong[$count] = strstr($song,'-', true);
      echo $nameSong[$count]."\n";
      echo $artistSong[$count]."\n";

      $count++;
    }
  }
  var_dump($listSongs);

  $count = 0;
  while ($count < count ($listSongs)){
    echo $nameSong[$count]."\n";
    echo $artistSong[$count]."\n";
    system("ffmpeg -i music/'$listSongs[$count]' -an -c:v copy img/'$artistSong[$count]- $nameSong[$count]'.jpg -y");
    echo "\n";
    $count++;
  }
?>