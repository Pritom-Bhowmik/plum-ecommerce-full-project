const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar && close) {
  bar.addEventListener('click', () => {
    nav.classList.add('active');
    close.classList.add('visible');
  });

  close.addEventListener('click', () => {
    nav.classList.remove('active');
    close.classList.remove('visible');
  });
}
