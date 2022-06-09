<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>OnTUNE</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="player">

    <div class="player__header">

      <div class="player__img player__img--absolute slider">

        <button class="player__button player__button--absolute--nw playlist">

          <img src="http://physical-authority.surge.sh/imgs/icon/playlist.svg" alt="playlist-icon">

        </button>

        <button class="player__button player__button--absolute--center play">

          <img src="http://physical-authority.surge.sh/imgs/icon/play.svg" alt="play-icon">
          <img src="http://physical-authority.surge.sh/imgs/icon/pause.svg" alt="pause-icon">

        </button>
        
          <?php
            $musicDir = scandir("./music");
            $imgDir = "img";
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
            
                  $count++;
                }
              }
            
          ?>

          <div class="slider__content">
          <?php
          $count = 0;
          while ($count < count ($listSongs)){
            if (str_contains($listSongs[$count], '.mp3')) {
              $songFile = str_replace('.mp3', '', $listSongs[$count]);
            }
            else{
              $songFile = str_replace('.flac', '', $listSongs[$count]);
            }
            
            echo "<img class=\"img slider__img\" src=\"$imgDir/$songFile.jpg\" alt=\"cover\">";
            echo "\n";

              $count++;
            }
          ?> 
        </div>

      </div>

      <div class="player__controls">

        <button class="player__button back">

          <img class="img" src="http://physical-authority.surge.sh/imgs/icon/back.svg" alt="back-icon">

        </button>
        
        <p class="player__context slider__context">

          <strong class="slider__name"></strong>
          <span class="player__title slider__title"></span>

        </p>

        <button class="player__button next">

          <img class="img" src="http://physical-authority.surge.sh/imgs/icon/next.svg" alt="next-icon">

        </button>

        <div class="progres">

          <div class="progres__filled"></div>

        </div>

      </div>

    </div>

    <ul class="player__playlist list">
    <?php
    $count = 0;
    while ($count < count ($listSongs)){
      if (str_contains($listSongs[$count], '.mp3')) {
        $songFile = str_replace('.mp3', '', $listSongs[$count]);
      }
      else {
        $songFile = str_replace('.flac', '', $listSongs[$count]);
      }

      ?>

      <li class="player__song">
      <?php
        echo "<img class=\"player__img img\" src=\"$imgDir/$songFile.jpg\" alt=\"cover\">";?>

        <p class="player__context">
        <?php
          echo "<b class=\"player__song-name\">$nameSong[$count]</b>"?>
          <span class="flex">
          <?php
            echo "<span class=\"player__title\">$artistSong[$count]</span>"?>
            <span class="player__song-time"></span>

          </span>

        </p>
        <?php
        echo "<audio class=\"audio\" src=\"music/$listSongs[$count]\"controls></audio>"?>

      </li>
      <?php
      $count++;
    }?>

    </ul>

  </div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>