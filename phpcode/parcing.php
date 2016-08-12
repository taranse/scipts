if ($_SERVER['REQUEST_URI'] == '/') {
//Если адресная строка после домена пустая
    $Page = 'index';
    $Module = 'index';
    $Cub = 'index';
    $Param = 'index';
} 
else {
    $URL_Parts = explode('/', trim($_SERVER['REQUEST_URI'], ' /'));
    //Делим на /
    for($i=0;$i<count($URL_Parts);$i++){
        $URL_Parts[$i] = parse_url($URL_Parts[$i]);
        //Парсим каждый элемент в двумерный массив
        parse_str($URL_Parts[$i]['query'], $URL_Parts[$i]['query']);
        //Парсим запрос после ? в Трехмерный массив
    }
    $Page = $URL_Parts[0]['path'];
    $Content = $URL_Parts[0]['query'];
    $Module = $URL_Parts[1]['path'];
    $Cub = $URL_Parts[2]['path'];
    $Param = $URL_Parts[3]['path'];
	$keysContent = array_keys($Content);
	for($i=0;$i<count($keysContent);$i++){
		if(($i+1) == count($keysContent)) $keys_content .= $keysContent[$i].'='.$Content[$keysContent[$i]];
		else $keys_content .= $keysContent[$i].'='.$Content[$keysContent[$i]].'&';
	}//Создаем ссылку на предыдущую страницу
	$nowPage = $URL_Parts[0]['path'].'?'.$keys_content;
}
