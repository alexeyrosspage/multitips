<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-language" content="ru"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="robots" content="noindex, nofollow">
<meta name="copyright" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?=STATICS_URL.'/css/style.css?'.$cache['style.css']?>">
<title>MultiTips</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="multitips">
	<div>
		<div id="lngs">
			<span class="eng <?=$lng_en?>" data-lng="0">EN</span>
			<span class="rus <?=$lng_ru?>" data-lng="1">RU</span>
		</div>
		<div class="description">
			<h1><b><em></em><i>Multi</i><i>-Tips</i><em></em></b></h1>
			<p><?=$lngs[$lng]['str1']?></p>
            <ul><?=$lngs[$lng]['str2']?></ul>
            <p><?=$lngs[$lng]['str3']?></p>
            <p><?=$lngs[$lng]['str4']?></p>
		</div>
		<div class="samples">
			<ul>
				<li><em><span id="tips_hover" data-tip="<?=$lngs[$lng]['tip1']?>"><?=$lngs[$lng]['ankor1']?></span></em></li>
				<li><em><span id="tips_color" data-tip="<?=$lngs[$lng]['tip2']?>"><?=$lngs[$lng]['ankor2']?></span></em></li>
				<li><em><span id="tips_click" data-tip="<?=$lngs[$lng]['tip3']?>"><?=$lngs[$lng]['ankor3']?></span></em></li>
				<li><em><span id="tips_ajax1"><?=$lngs[$lng]['ankor4']?></span></em></li>
				<li><em><span id="tips_ajax2"><?=$lngs[$lng]['ankor5']?></span></em></li>
				<li><em><span id="tips_hide"><?=$lngs[$lng]['ankor6']?></span></em></li>
			</ul>
		</div>
	</div>
</div>
<div id="all_tips"></div>
<script defer src="<?=STATICS_URL.'js/jquery_2.2.4.min.js'?>"></script>
<script><?=$jsServerStorage?></script>
<script defer src="<?=STATICS_URL.'js/main.js?'.$cache['main.js']?>"></script>
<script defer src="<?=STATICS_URL.'js/tips.js?'.$cache['tips.js']?>"></script>
</body>
</html>