var flight_booking_keyboard_navigation_loop = function (elem) {
  var flight_booking_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var flight_booking_firstTabbable = flight_booking_tabbable.first();
  var flight_booking_lastTabbable = flight_booking_tabbable.last();
  flight_booking_firstTabbable.focus();

  flight_booking_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      flight_booking_firstTabbable.focus();
    }
  });

  flight_booking_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      flight_booking_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};