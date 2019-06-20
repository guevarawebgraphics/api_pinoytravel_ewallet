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
  
      $('#tab-content div').removeClass('is-active');
      $('div[data-content="' + tab + '"]').addClass('is-active');
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

//START OF PROCESSOR IMAGE
//change processor image on select
//PROC1
$("#selectProc1").change(function(){
  // $procId = "";
  $("#BDOtext,#BOGtext,#BPItext,#BPIBtext,#DPAYtext,#MBTCtext,#CBCtext,#GRPYtext,#LBPAtext,#MAYBtext,#RCBCtext,#RSBtext,#UBEtext,#UBPtext,#UBPBtext,#UCPBtext").css('display', 'none');
  // $('#procDetailSection').html(" ");  
  if($("#selectProc1 option:selected").val() == ""){
    $('#procImgsrc').attr('src','');
  } else if($("#selectProc1 option:selected").val() == "BDO"){        
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/bdologo.jpg');    
    $('#BDOtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "BOG"){  
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/boguslogo.jpg');
    $('#BOGtext').css('display','block');    
    // $('#BOG' + 'text').css("display","inline");
  } else if($("#selectProc1 option:selected").val() == "BPI"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/bpilogo.jpg');
    $('#BPItext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "BPIB"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/bpilogo.jpg');
    $('#BPIBtext').css('display','block');    
  } else if($("#selectProc1 option:selected").val() == "DPAY"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/dragonpaylogo.jpg');
    $('#DPAYtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "MBTC"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/metrodlogo.jpg');
    $('#MBTCtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "CBC"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/cbclogo.jpg');
    $('#CBCtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "GRPY"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/grabpaylogo.jp');
    $('#GRPYtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "LBPA"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/lbplogo.jpg');
    $('#LBPAtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "MAYB"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/maylogo.jpg');
    $('#MAYBtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "RCBC"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/rcbca1logo.jpg');
    $('#RCBCtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "RSB"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/rsblogo.jpg');
    $('#RSBtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "UBE"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/ubpeonlogo.jpg');
    $('#UBEtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "UBP"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/ubplogo.jpg');
    $('#UBPtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "UBPB"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/ubplogo.jpg');
    $('#UBPBtext').css('display','block');
  } else if($("#selectProc1 option:selected").val() == "UCPB"){    
    $('#procImgsrc').attr('src','https://test.dragonpay.ph/Bank/images/ucpbclogo.jpg');
    $('#UCPBtext').css('display','block');
  }  
});

//PROC2
$("#selectProc2").change(function(){
  // $procId = "";
  // $("#BDRXtext,#BPXBtext,#MBTXtext,#MBXBtext,#AUBtext,#BOGXtext,#CBCXtext,#EWBXtext,#EWXBtext,#LBXBtext,#PNBBtext,#PNXBtext,#RCXBtext,#RSBBtext,#RSXBtext,#SBCAtext,#SBCBtext,#UBXBtext,$UCXBtext").css('display', 'none');
  $("#BDRXtext,#BPXBtext,#MBTXtext,#MBXBtext,#AUBtext,#BOGXtext,#CBCXtext,#EWBXtext,#EWXBtext,#LBXBtext,#PNBBtext,#PNXBtext,#RCXBtext,#RSBBtext,#RSXBtext").css('display', 'none');
  // $("#BOGXtext,#CBCXtext,#EWBXtext,#EWXBtext,#LBXBtext").css('display', 'none');
  // $("#PNBBtext,#PNXBtext,#RCXBtext,#RSBBtext,#RSXBtext").css('display', 'none');
  $("#SBCAtext,#SBCBtext,#UBXBtext,#UCXBtext").css('display', 'none');
  // $('#procDetailSection').html(" ");  
  if($("#selectProc2 option:selected").val() == ""){
    $('#procImgsrc2').attr('src','');
  } else if($("#selectProc2 option:selected").val() == "BDRX"){        
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/bdologo.jpg');    
    $('#BDRXtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "BPXB"){  
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/bpilogo.jpg');
    $('#BPXBtext').css('display','block');    
    // $('#BOG' + 'text').css("display","inline");
  } else if($("#selectProc2 option:selected").val() == "MBTX"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/metrologo.jpg');
    $('#MBTXtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "MBXB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/metrologo.jpg');
    $('#MBXBtext').css('display','block');    
  } else if($("#selectProc2 option:selected").val() == "AUB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/aublogo.jp');
    $('#AUBtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "BOGX"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/boguslogo.jpg');
    $('#BOGXtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "CBCX"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/cbclogo.jpg');
    $('#CBCXtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "EWBX"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/ewblogo.jpg');
    $('#EWBXtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "EWXB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/ewblogo.jpg');
    $('#EWXBtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "LBXB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/lbplogo.jpg');
    $('#LBXBtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "PNBB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/pnblogo.jpg');
    $('#PNBBtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "PNXB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/pnblogo.jpg');
    $('#PNXBtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "RCXB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/rcbclogo.jpg');
    $('#RCXBtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "RSBB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/rsblogo.jpg');
    $('#RSBBtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "RSXB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/rcbcslogo.jpg');
    $('#RSXBtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "SBCA"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/sbclogo.jpg');
    $('#SBCAtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "SBCB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/sbclogo.jpg');
    $('#SBCBtext').css('display','block');  
  } else if($("#selectProc2 option:selected").val() == "UBXB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/ubplogo.jpg');
    $('#UBXBtext').css('display','block');
  } else if($("#selectProc2 option:selected").val() == "UCXB"){    
    $('#procImgsrc2').attr('src','https://test.dragonpay.ph/Bank/images/ucpblogo.jpg');
    $('#UCXBtext').css('display','block');
  }  
});
//PROC4
$("#selectProc4").change(function(){
  // $procId = "";
  // $("#BDRXtext,#BPXBtext,#MBTXtext,#MBXBtext,#AUBtext,#BOGXtext,#CBCXtext,#EWBXtext,#EWXBtext,#LBXBtext,#PNBBtext,#PNXBtext,#RCXBtext,#RSBBtext,#RSXBtext,#SBCAtext,#SBCBtext,#UBXBtext,$UCXBtext").css('display', 'none');
  // $("#BDRXtext,#BPXBtext,#MBTXtext,#MBXBtext,#AUBtext,#BOGXtext,#CBCXtext,#EWBXtext,#EWXBtext,#LBXBtext,#PNBBtext,#PNXBtext,#RCXBtext,#RSBBtext,#RSXBtext").css('display', 'none');
  // $("#BOGXtext,#CBCXtext,#EWBXtext,#EWXBtext,#LBXBtext").css('display', 'none');
  // $("#PNBBtext,#PNXBtext,#RCXBtext,#RSBBtext,#RSXBtext").css('display', 'none');
  $("#BAYDtext,#LBCtext,#SMRtext,#CEBPtext,#RDStext,#ECPYtext,#RLNTtext").css('display', 'none');
  // $('#procDetailSection').html(" ");  
  if($("#selectProc4 option:selected").val() == ""){
    $('#procImgsrc4').attr('src','');
  } else if($("#selectProc4 option:selected").val() == "BAYD"){        
    $('#procImgsrc4').attr('src','https://test.dragonpay.ph/Bank/images/bdologo.jpg');    
    $('#BAYDtext').css('display','block');
  } else if($("#selectProc4 option:selected").val() == "LBC"){        
    $('#procImgsrc4').attr('src','https://test.dragonpay.ph/Bank/images/lbclogo.jpg');    
    $('#LBCtext').css('display','block');
  } else if($("#selectProc4 option:selected").val() == "SMR"){        
    $('#procImgsrc4').attr('src','https://test.dragonpay.ph/Bank/images/smlogo.jpg');    
    $('#SMRtext').css('display','block');
  } else if($("#selectProc4 option:selected").val() == "CEBP"){        
    $('#procImgsrc4').attr('src','https://test.dragonpay.ph/Bank/images/cebuana.jpg');    
    $('#CEBPtext').css('display','block');
  } else if($("#selectProc4 option:selected").val() == "RDS"){        
    $('#procImgsrc4').attr('src','https://test.dragonpay.ph/Bank/images/rdslogo.jpg');    
    $('#RDStext').css('display','block');
  } else if($("#selectProc4 option:selected").val() == "ECPY"){        
    $('#procImgsrc4').attr('src','https://test.dragonpay.ph/Bank/images/ecpaylogo.jpg');    
    $('#ECPYtext').css('display','block');
  } else if($("#selectProc4 option:selected").val() == "RLNT"){        
    $('#procImgsrc4').attr('src','https://test.dragonpay.ph/Bank/images/ruralnetlogo.jpg');    
    $('#RLNTtext').css('display','block');
  }

});



//END OF PROCESSOR IMAGE

function setMe($procName, $procRemark ){

  
}