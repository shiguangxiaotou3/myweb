<?php

$menu= [
    [
        'title'=>'认证','id'=>'user','items'=> [
            ['title'=>'注册','id'=>'signup'],
            ['title'=>'登陆','id'=>'login'],
        ]
    ],
    [
        'title'=>'模块',
        'id'=>'module',
        'items'=>[

        ]
    ],
];

function getstr($data){
    $str ='';
    foreach ($data as $datum){
        $str .='<li class=\'cat-item\'><a href="#'.$datum['id'].'">'.$datum['title'].'</a></li>';
        if(isset($datum['items'])){
            $str .= "<ul>".getstr($datum['items'])."</ul>";
        }
    }
    return  $str;
}

echo "<ul>".getstr($menu)."</ul>";