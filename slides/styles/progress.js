$(document).ready(function() {
    var i = 1;
    var count = $('.list section.slide').length;

    $('section.slide').each(function(e) {
        var width = Math.floor(100 * i/(count - 2)) + '%';
        $(this).append('<div class="progressbar"><div style="width: ' + width + '"></div></div>');

        i++;
    });
});
