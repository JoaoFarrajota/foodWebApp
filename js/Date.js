var now = new Date();

maxDate = nowtoISOString().substring(0, 10);

$('#dateInput').prop('max', maxDate);
