/**
 * Created by scrockett on 3/3/14.
 */


jQuery.webshims.polyfill();
jQuery.ajax({
    url: '//munchkin.marketo.net/munchkin.js',
    dataType: 'script',
    cache: true,
    success: function() {
        Munchkin.init('587-QLI-337');
    }
});
