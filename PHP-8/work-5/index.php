<?php
if(!@file_get_contents('https://habrahabr.ru/post/' . $_GET['id'])){
    echo '{"status": "error"}';
}else{    
    $content = file_get_contents('https://habrahabr.ru/post/' . $_GET['id']);

    preg_match_all('|<h1 class="post__title">(.*)</h1>|sUSi', $content, $title);
    preg_match_all('|<div class="content html_format">(.*)</div>|sUSi', $content, $text);
    preg_match('|(.*)[\.\!\?]|sUSi',$text[0][0], $text);
    preg_match_all('|<span class="post__time_published">(.*)</span>|sUSi', $content, $date);
    preg_match_all('|<div class="statistic__value statistic__value_magenta">(.*)</div>|sUSi', $content, $rating);
    preg_match_all('|<span class="voting-wjt__counter-score js-score" title="(.*)">(.*)</span>|sUSi', $content, $stars);
    preg_match_all('|<div class="views-count_post" title="Просмотры публикации">(.*)</div>|sUSi', $content, $views);
    preg_match_all('|<ul class="tags icon_tag">(.*)</ul>|sUSi', $content, $tags);
    preg_match_all('|<li(.*)>(.*)</li>|sUSi', $tags[0][0], $tagMass);

    $mass['title'] = trim(strip_tags($title[0][0]));
    $mass['text'] = trim(str_replace('|(<(\/?[^>]+)>)|', '', $text[0]));
    $mass['date'] = trim(strip_tags($date[0][0]));
    $mass['rating'] = trim(strip_tags($rating[0][0]));
    $mass['stars'] = trim(strip_tags($stars[0][0]));
    $mass['views'] = trim(strip_tags($views[0][0]));

    if(isset($tagMass[0][0])){
        $mass['tags'] = [];
        for($i=0;$i<count($tagMass[0]);$i++){
            array_push($mass['tags'], trim(strip_tags(str_replace(',', '', $tagMass[0][$i]))));
        }
    }
    echo json_encode($mass);
}