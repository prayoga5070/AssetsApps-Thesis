$(document).ready(function () {

 $('body').layout({ applyDemoStyles: false });

 //$("#mainmenu").load("main.php?action=menu");

 myLayout = $('body').layout({
     west__size:            300
 ,    east__size:            300
     // RESIZE Accordion widget when panes resize
 ,    west__onresize: $.layout.callbacks.resizePaneAccordions
 ,    east__onresize: $.layout.callbacks.resizePaneAccordions
 });

 // ACCORDION - in the West pane
 $("#accordion1").accordion({ fillSpace:    true });

 // ACCORDION - in the East pane - in a 'content-div'
 $("#accordion2").accordion({
     fillSpace:    true
 ,    active:        1
 });

 // THEME SWITCHER
 //addThemeSwitcher('.ui-layout-north',{ top: '12px', right: '5px' });
 // if a new theme is applied, it could change the height of some content,
 // so call resizeAll to 'correct' any header/footer heights affected
 // NOTE: this is only necessary because we are changing CSS *AFTER LOADING* using themeSwitcher
 setTimeout( myLayout.resizeAll, 1000 ); /* allow time for browser to re-render with new theme */


function callback(value) {
if (value) {
 //return 'yes';
 $("#confresult").val('ok');
} else {
 $("#confresult").val('cancel');
 //return 'no';
}}

});
