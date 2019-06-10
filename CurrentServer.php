<!DOCTYPE HTML>

<html>
	<head>
		<title>ServerStatus</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="stylesheet_G.css" />
		<link rel="stylesheet" href="stylesheet_server.css" />
		<link rel="stylesheet" href= "fonts/fonts.css"></link>
	</head>
	
	<body>
		<div class="AR-container">
			<header>
			<div id ="ip_banner"> <div id ="ip"><p><?php echo $RawIp; ?></p></div> </div>
			</header>
		</div>
		<div class="AR-container">
			<main>
				<div id="favicon"> <?php echo $favicon; ?> </div>
				<div id="modt">
					<p>
						<?php
						echo $modt;
						?>
					</p>
				</div>
				
				<div id="Version">
					<p>version <?php echo $version; ?> </p>
				</div>
				
				<div id="players"><p> <?php echo $currentPlayers; ?>/<?php echo $maxPlayers; ?>  joueurs connectes</p></div>
				
				<div id="status"><p> <?php echo $status; ?> </p></div>
					
			</main>
		</div>

	</body>
</html>