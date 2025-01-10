function arCuGetCookie(cookieName){
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(cookieName + "=");
        if (c_start != -1) {
            c_start = c_start + cookieName.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return 0;
};
function arCuCreateCookie(name, value, days){
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
};
function arCuShowMessage(index){
    if (arCuPromptClosed){
        return false;
    }
    if (typeof arCuMessages[index] !== 'undefined'){
        jQuery('#arcontactus').contactUs('showPromptTyping');

        _arCuTimeOut = setTimeout(function(){
            if (arCuPromptClosed){
                return false;
            }
            jQuery('#arcontactus').contactUs('showPrompt', {
                content: arCuMessages[index]
            });
            index ++;
            _arCuTimeOut = setTimeout(function(){
                if (arCuPromptClosed){
                    return false;
                }
                arCuShowMessage(index);
            }, arCuMessageTime);
        }, arCuTypingTime);
    }else{
        if (arCuCloseLastMessage){
            jQuery('#arcontactus').contactUs('hidePrompt');
        }
        if (arCuLoop){
            arCuShowMessage(0);
        }
    }
};
function arCuShowMessages(){
    setTimeout(function(){
        clearTimeout(_arCuTimeOut);
        arCuShowMessage(0);
    }, arCuDelayFirst);
}
function arCuShowWelcomeMessage(index){
    if (typeof arWelcomeMessages[index] !== 'undefined'){
        jQuery('#arcontactus').contactUs('showWellcomeTyping');

        _arCuWelcomeTimeOut = setTimeout(function(){
            jQuery('#arcontactus').contactUs('showWellcomeMessage', {
                content: arWelcomeMessages[index]
            });
            index ++;
            _arCuWelcomeTimeOut = setTimeout(function(){
                arCuShowWelcomeMessage(index);
            }, arWelcomeMessageTime);
        }, arWelcomeTypingTime);
    }else{

    }
};
function arCuShowWellcomeMessages(){
    setTimeout(function(){
        clearTimeout(_arCuWelcomeTimeOut);
        arCuShowWelcomeMessage(0);
    }, arWelcomeDelayFirst);
}
window.addEventListener('load', function(){
    jQuery('#arcontactus-storefront-btn').click(function(e){
        e.preventDefault();
        setTimeout(function(){
            jQuery('#arcontactus').contactUs('openMenu');
        }, 200);
    });
    jQuery('body').on('click', '.arcu-open-menu', function(e){
        e.preventDefault();
        e.stopPropagation();
        jQuery('#arcontactus').contactUs('closeCallbackPopup');
        jQuery('#arcontactus').contactUs('openMenu');
        return false;
    });
    jQuery('body').on('click', '.arcu-toggle-menu', function(e){
        e.preventDefault();
        e.stopPropagation();
        jQuery('#arcontactus').contactUs('toggleMenu');
        return false;
    });
    jQuery('body').on('click', '.arcu-open-callback', function(e){
        e.preventDefault();
        e.stopPropagation();
        arCuPromptClosed = true;
        jQuery('#arcontactus').contactUs('hidePrompt');
        jQuery('#arcontactus').contactUs('hideForm');
        jQuery('#arcontactus').contactUs('closeMenu');
        jQuery('#arcontactus').contactUs('showForm', 'callback');
        return false;
    });
    jQuery('body').on('click', '.arcu-open-email', function(e){
        e.preventDefault();
        e.stopPropagation();
        arCuPromptClosed = true;
        jQuery('#arcontactus').contactUs('hidePrompt');
        jQuery('#arcontactus').contactUs('hideForm');
        jQuery('#arcontactus').contactUs('closeMenu');
        jQuery('#arcontactus').contactUs('showForm', 'email');
        return false;
    });
    jQuery('body').on('click', '.arcu-open-form', function(e){
        var formId = jQuery(this).data('form-id');
        e.preventDefault();
        e.stopPropagation();
        arCuPromptClosed = true;
        jQuery('#arcontactus').contactUs('hidePrompt');
        jQuery('#arcontactus').contactUs('hideForm');
        jQuery('#arcontactus').contactUs('closeMenu');
        jQuery('#arcontactus').contactUs('showForm', formId);
        return false;
    });
    jQuery('body').on('click', '.arcu-close-callback,.arcu-close-email,.arcu-close-form', function(e){
        e.preventDefault();
        e.stopPropagation();
        jQuery('#arcontactus').contactUs('hideForm');
        return false;
    });
});