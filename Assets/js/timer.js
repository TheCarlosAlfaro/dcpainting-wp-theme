jQuery(document).ready(function($) {

    var rtl;

if( the_conference_data.rtl == '1' ){
    rtl = true;
}else{
    rtl = false;
}
//banner countdown
if ( ! ( the_conference_data.banner_event_timer === undefined || the_conference_data.banner_event_timer.length == 0 ) ) {
    $('#bannerClock .days').countdown( the_conference_data.banner_event_timer, function(event) {
        $(this).html(event.strftime('%D'));
    });
    $('#bannerClock .hours').countdown( the_conference_data.banner_event_timer, function(event) {
        $(this).html(event.strftime('%H'));
    });
    $('#bannerClock .minutes').countdown(the_conference_data.banner_event_timer, function(event) {
        $(this).html(event.strftime('%M'));
    });
    $('#bannerClock .seconds').countdown(the_conference_data.banner_event_timer, function(event) {
        $(this).html(event.strftime('%S'));
    });                                                                                                                          
}

});
