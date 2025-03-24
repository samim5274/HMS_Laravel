const today = new Date().toISOString().split('T')[0];
const datePicker = document.getElementById('currentDate');
const datePicker2 = document.getElementById('beforeDate');
datePicker2.setAttribute('max', today);
datePicker.setAttribute('max', today);