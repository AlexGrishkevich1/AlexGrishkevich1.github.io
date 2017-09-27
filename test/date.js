function format(val) {
  if (val<10) { val = '0' + val; }
  return val;
}
var now = new Date();
function update() {
  now = new Date(now.getTime()-1000);
  document.querySelector('span.year').innerHTML=format(now.getFullYear()   );
  document.querySelector('span.month').innerHTML=format(now.getMonth()+1   );
  document.querySelector('span.date').innerHTML=format(now.getDate()   );
}
update();
