<?php

include_once 'resource/functions.php';

head();

if ($_SERVER['REQUEST_URI'] == '/') {
	$page = 'index';
	$modul = 'index';
} 

else {
	$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$URL_Parts = explode('/', trim($URL_Path, ' /'));
	$page = array_shift($URL_Parts);
	$modul = array_shift($URL_Parts);


	if (!empty($modul)) {
		$Param = array();
		for ($i = 0; $i < count($URL_Parts); $i++) {
			$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
		}
	}
}

header_teg();

$pageArr = array('index', 'advtEvent', 'reportEvent', 'galleryEvent', 'contacts', 'about');
if (in_array($page, $pageArr)){
	echo '
		<button id="click" style="position: fixed; bottom: 10px; left: 10px;">Кнопочка</button>
		
		<div class="buttons">
			<button id="1" class="butTheme">1</button>
			<button id="2" class="butTheme">2</button>
			<button id="3" class="butTheme">3</button>
			<button id="4" class="butTheme">4</button>
		</div>
		
		<div class="navigationBar">
			<ul align="center">
				<a href="/"><li id="">Главная</li></a>
				<a href="advtEvent"><li id="">Анонс событий</li></a>
				<a href="reportEvent"><li id="">Отчётные события</li></a>
				<a href="galleryEvent"><li id="">Галерея событий</li></a>
				<a href="contacts"><li id="">Контакты</li></a>
				<a href="about"><li id="">О нас</li></a>
			</ul>
		</div>
	';

	echo '<div class="content">';

	if ($page == 'index') include_once '/pages/main.php';

	else {
		include_once '/pages/'.$page.'.php';
	}

	echo '</div>';
	
	footer();
	
}else{
	exit ('<p style="text-align: center; font-size: 36px; margin-top: 100px;">Error 404 Not found</p>');	
}


?>