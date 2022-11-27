# Multi-tips (jQuery plugin) — active tips on your page
jQuery plugin "MultiTips" adds some very useful options and customization options to the classic "hover" tooltips options.

![](https://github.com/alexrosspage/multitips/blob/main/TIPS_B.png)

> Just add one line to your javascript file and enjoy any functional hints on your page

> Important: you can also use these hints after an AJAX request to the server

**GitHub**: [https://github.com/alexrosspage/multitips](https://github.com/alexrosspage/multitips)

**Demo**: [http://multitips.epizy.com](http://multitips.epizy.com/)

***
## Setting
### Plugin connection
#### Script connection:
```
<script defer src="jquery_2.2.4.min.js"></script>
<!--<script defer src="main.js"></script> Helper functions can be defined here -->
<script defer src="hiddenarea.js"></script>
```
#### Plugin connection in script:
```
$(document).ready(function ()
{
 $('#hiddenarea').hiddenarea(
     {
         'number': 3,
         'message': 'Text below plugin'
     });
});
```
or directly in the body of the page, leaving the default settings
```
<script>$('#hiddenarea').hiddenarea();</script>
```
#### Plugin connection in HTML. You can connect the plugin several times on the page, the script will look for elements with the class "upload":
```
<div class="uploads" id="hiddenarea"></div>
```
#### Plugin settings
Plugin settings are defined by the «option» variable. The variable option is an object, with the following keys:
```
option['message'];// Message under the block, pictures. The default is empty.

option['megabyte'];// The maximum image size in megabytes. The default is 5 megabytes.

option['number'];// The number of images in the block. The default is one picture.
```
#### Plugin helper functions that can be defined before connecting in the plugin.
1. saveError. 
This function is to show and/or send an error to the server. By default (if the function is not defined above), the function will display an error on the browser screen through the «alert» command.
```
 function saveError(error)
    {
        alert('HiddenAres error. '+error['message']+': '+error['line']);//You can comment
this line and then no errors will be displayed
    }
```

2. Tip
This function is needed to show hints and the result of your actions. By default (if the function is not defined above), the function will display an message on the browser screen through the «alert» command.
```
    $.fn.Tip=function (error)
    {
        if(typeof (error['text'])!='undefined'){
            alert(error['text']);//You can comment
this line and then no messages will be displayed
        }
    }
```

***
## License
MIT
