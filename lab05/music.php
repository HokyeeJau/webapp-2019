<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			I love music.
			<?php
			$song_count = (int)5678;
			$music_time = (int)123;
			echo "I have $song_count total songs,";
			echo "which is over $music_time hours of music!";
			 ?>
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			<?php
			$news_bound = $_GET["newspages"];
			$news_bound = (int)$news_bound;
			if ($news_bound == 0){
				$news_bound = 5;
			}
			for ($i = 1; $i <= $news_bound; $i++){
				echo $i;
				$date = 201912 - $i;
				$month = 12-$i;
				echo ". <a href=\"https://www.billboard.com/archive/article/$date\">2019-";
				if($month<10){
					print "0";
					print $month;
				}else{
					print $month;
				}
				echo "</a><br>";
			}
			 ?>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<?php
			// $fav_art = array("Guns N' Roses","Green Day","Blink182","Queen");
			$fav_art = file("favorite.txt");
			for($i=0; $i<count($fav_art); $i++){
				echo "$i"+1;
				echo ". <a href=\"http://en.wikipedia.org/wiki/$fav_art[$i]\">$fav_art[$i]</a>";
				//echo strlen($fav_art[$i]);
				echo "<br>";
			}
			 ?>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				$dir = "./lab5/musicPHP/songs/";
				$fsss = array();
				function FileSizeConvert($bytes) {
					$bytes = floatval($bytes);
					$arBytes = array(
						0 => array(
							"UNIT" => "TB",
							"VALUE" => pow(1024, 4)
						),1 => array(
							"UNIT" => "GB",
							"VALUE" => pow(1024, 3)
						),2 => array(
							"UNIT" => "MB",
							"VALUE" => pow(1024, 2)
						),3 => array(
							"UNIT" => "KB",
							"VALUE" => 1024
						),4 => array(
							"UNIT" => "B",
							"VALUE" => 1
						),
					);
					foreach($arBytes as $arItem){
						if($bytes >= $arItem["VALUE"]){
							$result = $bytes / $arItem["VALUE"];
							$result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
							break;
						}
					}
					return $result;
				}
				$i = 0;
				if (is_dir($dir)){
					if ($dh = opendir($dir)){
						while(($file=readdir($dh)) !== false){
							if(filetype($dir.$file)[0]!=='d'){
								// echo "filename: $file: filetype: ".filetype($dir.$file)."<br>";
								$fs = filesize($dir.$file);
								if($fs>1000){
									$fsss[$file] = $fs;
									echo "<li class=\"mp3item\">
											<a href=\"lab5/musicPHP/songs/$file\">$dir$file</a>"
											."("
											.FileSizeConvert($fs)
											.")"
											."</li>";
								}

							}
						}
						closedir($dh);
					}
				}
				 ?>
				<!-- <li class="mp3item">
					<a href="lab5/musicPHP/songs/paradise-city.mp3">paradise-city.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/basket-case.mp3">basket-case.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/all-the-small-things.mp3">all-the-small-things.mp3</a>
				</li> -->

				<!-- Exercise 8: Playlists (Files) -->
				<?php
				$j = 0;
				$ctlist = glob("./lab5/musicPHP/songs/*.m3u");
				function list_filter($var){
					return $var[0]!=='#';
				}
				foreach ($ctlist as $key) {
					print "<li class=\"playlistitem\">$key<ul>";
					$ff = file($key);
					$ff = array_filter($ff, "list_filter");
					if ($j == 0){
						$ff = array_reverse($ff);
						$j++;
					} else if ($j == 1){
						$ff = shuffle($ff);
						$j++;
					} else {
						$ff = rsort($ff);
						$j++;
					}
					foreach ($ff as $kk) {
						print $kk."<br>";
					}
					echo "</ul></li>";
				}
				 ?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
