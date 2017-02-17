function format(val) {
  if (val<10) { val = '0' + val; }
  return val;
}

var now = new Date(0, 0, 10, 0, 0 ,1);

setInterval(update, 1000);

update();

function update() {
  now = new Date(now.getTime()-1000);
  document.querySelector('div.date').innerHTML=format(now.getDate()   );
  document.querySelector('div.hours').innerHTML=format(now.getHours()  );
  document.querySelector('div.minuts').innerHTML=format(now.getMinutes()  );
  document.querySelector('div.seconds').innerHTML=format(now.getSeconds()  );
}