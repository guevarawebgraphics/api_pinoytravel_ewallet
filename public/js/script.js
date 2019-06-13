//Bulma Modals
document.addEventListener('DOMContentLoaded', function () {

    // Modals
  
    var rootEl = document.documentElement;
    var $modals = getAll('.modal');
    var $modalButtons = getAll('.modal-button');
    var $modalCloses = getAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button');
  
    if ($modalButtons.length > 0) {
      $modalButtons.forEach(function ($el) {
        $el.addEventListener('click', function () {
          var target = $el.dataset.target;
          var $target = document.getElementById(target);
          rootEl.classList.add('is-clipped');
          $target.classList.add('is-active');
        });
      });
    }
  
    if ($modalCloses.length > 0) {
      $modalCloses.forEach(function ($el) {
        $el.addEventListener('click', function () {
          closeModals();
        });
      });
    }
  
    document.addEventListener('keydown', function (event) {
      var e = event || window.event;
      if (e.keyCode === 27) {
        closeModals();
      }
    });
  
    function closeModals() {
      rootEl.classList.remove('is-clipped');
      $modals.forEach(function ($el) {
        $el.classList.remove('is-active');
      });
    }
  
    // Functions
  
    function getAll(selector) {
      return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
    }
  
  });

  document.addEventListener('DOMContentLoaded', () => {
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
      $notification = $delete.parentNode;
      $delete.addEventListener('click', () => {
        $notification.parentNode.removeChild($notification);
      });
    });
  });
  // $('#notifDelete').click(function(){
  //     $('#notif').fadeOut();

  // });


  //TABS ON RESELLER TOP UP
  $(document).ready(function() {
    $('#tabs li').on('click', function() {
      var tab = $(this).data('tab');
  
      $('#tabs li').removeClass('is-active');
      $(this).addClass('is-active');
  
      $('#tab-content p').removeClass('is-active');
      $('p[data-content="' + tab + '"]').addClass('is-active');
    });
  });
  //END OF TABS

//SELECT TABS ON RESELLER TOP UP
$("#paymentAmount").change(function(){
  // alert($("#paymentAmount option:selected").index());
  // alert($("select[name='paymentAmount'] option:selected").index());
  if($("#paymentAmount option:selected").index() == 9){
    $('#customForm').fadeIn();
  } else {
    $('#customForm').fadeOut();    
  }

});
// END OF SELECT TABS ON RESELLER TOP UP