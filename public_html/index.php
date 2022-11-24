<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');
setlocale(LC_ALL, 'ru_RU.UTF-8');
setlocale(LC_NUMERIC, 'C');

spl_autoload_register('classAutoload');//функции автоподгрузки
register_shutdown_function('shutDown');//запуск функции после завершения скрипта
set_error_handler('systemError');//перехват системных ошибок

define ('D1', dirname(__DIR__) . '/');
define ('PUBLIC_DIR',getcwd().'/');

if(!strpos(PUBLIC_DIR,'htdocs'))//
{
    define ('MDIR', basename(D1));
}
else
{
    define ('MDIR', 'multitips.epizy.com');
}

define ('STATICS_DIR','statics');
define ('STATICS_PATH',PUBLIC_DIR.STATICS_DIR.'/');

define ('HDIR','http://');
define('MAIN_URL',HDIR.MDIR.'/');
define('STATICS_URL',MAIN_URL.STATICS_DIR.'/');


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
    require 'index_ajax_post.php';
    exit;
}

$cache=[];
$cache['style.css']=filemtime(STATICS_PATH.'css/style.css');
$cache['main.js']=filemtime(STATICS_PATH.'js/main.js');
$cache['tips.js']=filemtime(STATICS_PATH.'js/tips.js');

if(!empty($_COOKIE['ru_language']))
{
    $lng=1;
    $lng_en='';
    $lng_ru='act';
}
else
{
    $lng=0;
    $lng_en='act';
    $lng_ru='';
}

$lngs=
    [
        0=>[
            'str1'=>'jQuery plugin "Multi-Tips" adds some very useful options and customization options to the classic "hover" tooltips options:',
            'str2'=>'<li>Unlimited number of tips on the page with personal settings and their automatic collection;</li>
            <li>The ability to determine a specific ID for each hint for further manipulations with its behavior on the page;</li>
            <li>Flexible setting of parameters: color, closing time, closing prohibition;</li>
            <li>The ability to replace the hint object;</li>
            <li>The ability to transfer the hint text directly, without the data-tip attribute;</li>
            <li>Passing your own function to be executed after the hint is shown.</li>',
            'str3'=>'The ability to show the pending result of the script (for example, after AJAX work) through the MultiTips hints can make this tool very useful for you.',
            'str4'=>'See on <a href="https://github.com/alexrosspage/multitips" target="_blank"><svg height="22" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="22" data-view-component="true" class="octicon octicon-mark-github">
    <path fill="#0b8693" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
</svg> GitHub</a>',
            'tip1'=>"Hover hints are very useful when you want to save space and declutter a page with information. If you are using a touchpad and don't have a mouse, then the tooltip will work when you click on the element.",
            'ankor1'=>'Tips by hover (tap on touchpad)',
            'tip2'=>'Tips highlighted in color, such as red, may indicate errors or describe any abnormal situations.',
            'ankor2'=>'Highlighting text',
            'tip3'=>'Click hints are very useful when you do not impose your information, but at any time the user can access it. Clicking on this message will close it.',
            'ankor3'=>'Tips by click (tap)',
            'ankor4'=>'Make an AJAX request and remove it after 10 seconds',
            'ankor5'=>'Make an AJAX request and execute my JS function',
            'ankor6'=>'Hide all tips from screen'
        ],
        1=>[
            'str1'=>'jQuery плагин «Multi-Tips» к классическим опциям всплывающих подсказок «hover» добавляет ещё несколько очень полезных вариантов и опций настройки:',
            'str2'=>'<li>Неограниченное количество подсказок на странице c персональными настройками и их автоматический сбор;</li>
            <li>Возможность определения конкретного ID для каждой подсказки для дальнейших манипуляций с её поведением на странице;</li>
            <li>Гибкая настройка параметров: цвет, время закрытия, запрет на закрытие;</li>
            <li>Возможность замены объекта подсказки;</li>
            <li>Возможность передачи текста подсказки напрямую, без аттрибута data-tip;</li>
            <li>Передача собственной функции для выполнения после показа подсказки.</li>',
            'str3'=>'Возможность показывать через подсказки «MultiTips» отложенный результат работы скрипта (например после работы AJAX) несомненно сделает этот инструмент очень полезным для вас.',
            'str4'=>'Посмотреть на <a href="https://github.com/alexrosspage/hiddenarea" target="_blank"><svg height="22" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="22" data-view-component="true" class="octicon octicon-mark-github">
    <path fill="#0b8693" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
</svg> GitHub</a>',
            'tip1'=>'Подсказки по наведению очень полезны, когда вы хотите сэкономить место и разгрузить страницу информацией. Если вы используете тачпад и у вас нет мышки, то подсказка сработает при клике на элемент.',
            'ankor1'=>'Подсказка по наведению (касание на тачпаде)',
            'tip2'=>'Подсказки выделенные цветом, например красным, могут указывать на ошибки или описывать какие-либо внештатные ситуации',
            'ankor2'=>'Подсказка, выделенная цветом',
            'tip3'=>'Подсказки по клику очень полезны, когда вы не навязываете свою информацию, но в любой момент пользователь может к ней обратится. Клик по этому сообщению закроет его.',
            'ankor3'=>'Подсказка по клику (касанию)',
            'ankor4'=>'Сделать AJAX-запрос и убрать его через 10 секунд',
            'ankor5'=>'Сделать AJAX-запрос и выполнить мою JS-функцию',
            'ankor6'=>'Скрыть все подсказки с экрана'
        ]
    ];

$jsServerStorage="
var serverStorage={};
serverStorage['MAIN_URL']='".MAIN_URL."';
serverStorage['STATICS_URL']='".STATICS_URL."';";

include 'index_html.php';
define ('CLOSE','NORMAL');
exit;

function classAutoload($class){
    $file=PUBLIC_DIR.'classes/'.$class.'.php';
    if(is_file($file))
    {
        require_once $file;
    }
    else systemError(0, 'Class «'.$class.'» not found', 'index.php', 0);//функция перехвата ошибок};
}

function systemError($type, $message, $file, $line)//функция перехвата ошибок
{
    if(!defined('CLOSE'))
    {
        header($_SERVER['SERVER_PROTOCOL'].' 503 Service Temporarily Unavailable');
        header('Status: 503 Service Temporarily Unavailable');
        header("Connection: Close");
        file_put_contents(PUBLIC_DIR.'last_php_error.php','CLOSE: '.$type.' '.$message.' '.$file.': '.$line,LOCK_EX);
        
        define('CLOSE','ERROR');
    }
    exit;
}

function shutDown()
{
    if(($error = error_get_last()) && (isset($error['type'])))//передать в исключения системные ошибки если есть ошибка
    {
        systemError($error['type'], $error['message'], $error['file'], $error['line']);
    }
}