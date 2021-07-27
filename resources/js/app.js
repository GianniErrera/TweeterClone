require('./bootstrap');

require('alpinejs');

$("document").ready(function(){
    setTimeout(function(){
        $(".flash_message").remove();
    }, 3000 );
});
