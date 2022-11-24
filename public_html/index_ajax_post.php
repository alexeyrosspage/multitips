<?php
if(!isset($_POST['id']))exit;

$construct=function ($result)
{
    echo $result;
    exit;
};

switch ($_POST['id'])
{
    case(1)://php-server выступает только в качестве хранилища, все переменные передаются
        
        if(!empty($_POST['lng']))
        {
            $mess='Текущая дата и время на сервере сейчас: ';
        }
        else
        {
            $mess='The current date and time on the server is now: ';
        }
        
        $R=['message'=>$mess.date('d.m.Y H:i:s')];
        $construct(json_encode($R,JSON_UNESCAPED_UNICODE|JSON_NUMERIC_CHECK));
        break;
    
    case(2)://php-server выступает только в качестве хранилища, все переменные передаются
    
        if(!empty($_POST['lng']))
        {
            $mess='AJAX запрос был выполнен и была запущена пользовательская функция';
        }
        else
        {
            $mess='The AJAX request has been executed and the custom function has been run';
        }
        
        $R=['message'=>$mess];
        $construct(json_encode($R,JSON_UNESCAPED_UNICODE|JSON_NUMERIC_CHECK));
        break;
        
    default:exit;
}

exit;