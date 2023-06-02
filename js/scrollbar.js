var userAgent = navigator.userAgent.toLowerCase();
var scrollableContent = document.getElementById('scrollable-content');

if (userAgent.indexOf('firefox') > -1) {
  scrollableContent.classList.add('firefox');
} else if (userAgent.indexOf('safari') > -1) {
  scrollableContent.classList.add('safari');
} else if (userAgent.indexOf('chrome') > -1) {
  scrollableContent.classList.add('chrome');
}
