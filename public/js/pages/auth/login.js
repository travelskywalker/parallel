var working = false;



$('button').click(function(e) {
  if($('#email').val() == '' || $('#password').val() == '' ) return;

  e.preventDefault();
  if (working) return;
  working = true;
  var $this = $('.login'),
    $state = $this.find('button > .state');
  $this.addClass('loading');
  $state.html('Authenticating');
  setTimeout(function() {
    $('.login').submit();
  }, 2000);
});