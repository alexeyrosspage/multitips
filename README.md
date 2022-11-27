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
<script defer src="tips.js"></script>
```
#### Plugin connection in script:
```
$(document).ready(function ()
{
   $('#tip_1').Tip();
});
```
or directly in the body of the page, leaving the default settings
```
<script>
   $('#tip_2').Tip({type: 'click_auto',color:'red', time: 5000, 'text': 'Image refresh failed, please refresh the page and try again'});
</script>
```
#### Plugin connection in HTML. You can connect the plugin several times on the page:
```
<div data-tip="My title for hover" id="tip_1"></div>
<div id="tip_2"></div>

```
#### Plugin settings
Plugin settings are defined by the «option» variable. The variable option is an object, with the following keys:
```
    //plugin configuration option
    options = options || {};

    //Ability to define a specific ID for each tips for further manipulation of its behavior on the page
    options.id = options.id || 0;
    
    //Tips type:
    // - «hover» tips (touchpad click) - default,
    // - «click» tips/disable re-click
    // - «click_mess» show tips/disable click on tips
    // - «click_auto» tips/turn off after a set time
    // - «hide_all» tips from the screen
    options.type = options.type || 'hover';

    //default tips auto-hide time
    options.time = options.time || 3000;

    //permission to close the tips
    options.close = options.close || true;

    //close all tips on the screen
    options.hide = options.hide || true;

    //tips color
    options.color = options.color || 'grey';

    //replace tips object
    options.replace = options.replace || false;

    //transmitting the tips text directly, without data-tip
    options.text = options.text || null;

    //passing your own function to execute after the tips is shown
    options.function = options.function || null;
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
***
## License
MIT
