function getStorage(key_prefix) {
    // this function will return us an object with a "set" and "get" method
    // using either localStorage if available, or defaulting to document.cookie
    if (window.localStorage) {
        // use localStorage:
        return {
            set: function(id, data) {
                localStorage.setItem(key_prefix+id, data);
            },
            get: function(id) {
                return localStorage.getItem(key_prefix+id);
            }
        };
    } else {
        // use document.cookie:
        return {
            set: function(id, data) {
                document.cookie = key_prefix+id+'='+encodeURIComponent(data);
            },
            get: function(id, data) {
                var cookies = document.cookie, parsed = {};
                cookies.replace(/([^=]+)=([^;]*);?\s*/g, function(whole, key, value) {
                    parsed[key] = unescape(value);
                });
                return parsed[key_prefix+id];
            }
        };
    }
}

jQuery(function($) {
    // a key must is used for the cookie/storage
    var storedData = getStorage('todo_wp_checkboxes_');
    
    $('div.check input:checkbox').bind('change',function(){
        $('#'+this.id+'txt').toggle($(this).is(':checked'));
        // save the data on change
        storedData.set(this.id, $(this).is(':checked')?'checked':'not');
    }).each(function() {
        // on load, set the value to what we read from storage:
        var val = storedData.get(this.id);
        if (val == 'checked') {
          $(this).attr('checked', 'checked');
          var pChecked = $(this).parent('p').css('text-decoration', 'none');
           pChecked.css('text-decoration', 'line-through').slideUp(100, function () {
            $(this).parent('div').append(pChecked.slideDown(100) );
        });
        }
        if (val == 'not') $(this).removeAttr('checked');
        if (val) $(this).trigger('change');
    });


$('.check').on('click', '.chb', function(e) {
    var pChecked = $(this).parent('p').css('text-decoration', 'none');

    if ( $(this).is(':checked') ) {
        pChecked.css('text-decoration', 'line-through').delay(300).slideUp(500, function () {
            $(this).parent('div').append( pChecked.slideDown(500) );
        });
    }
    else {
      pChecked.slideUp(500, function () {
            $(this).parent('div').prepend(pChecked.slideDown(500) );
        });

    }
});

});

