//$('#click').click(function() {
    //$('div.wrapper').find('div').toggleClass('small big');
//});

$(document).ready(function()
{
    $('.wrapper').find('a[href="#"]').on('click', function (e) {
        e.preventDefault();
        this.expand = !this.expand;
        $(this).text(this.expand?"Click to collapse":"Click to read more");
        $(this).closest('.wrapper').find('.small, .big').toggleClass('small big');
    });
});
