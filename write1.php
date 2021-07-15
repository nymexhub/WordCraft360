<?php 
/*
Program for writers developed by Felipe Alfonso Gonzalez
email: f.alfonso.go@gmail.com
(CC) All protected under a licence creative commons
*/

include('db.php');
// $qs_res=$_POST['qs'];
// $df=$_GET['id'];

//$sql1="select * from data where note like '%$qs%'  or note like '%$qs%+%$qs%' or pre_note like '%$qs%' or pre_note like '%$qs%+%$qs%'";
$sql1="SELECT * FROM `reg_750`";
#ejecuto la query
$rs1 = mysql_query ($sql1,$link1) or die ('<br><b>Error!.</b>');
?>
<html>
<head>

<title>Word Counter & Toolkit Platform for writers</title>
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.textarea-expander.js"></script>
<link rel="stylesheet" href="style2.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
<script type="text/javascript" src="js2.js"></script>
<link href='favicon.gif' rel='shortcut icon' />

</head>
<body>

<!-- -->

<div id="losing_words"></div>
<script type="text/javascript" language="javascript">

window.onbeforeunload = function (e) {
  e = e || window.event;
  if ($('#changed').val() == 0) {
    // No change leaving the page is ok.
    return;
  }
  // IE, Firefox prior to v 4.
  if (e) {
    e.returnValue = 'Ahoj!';
  }
  // Safari
  return 'Ahoj!';
};

var check_outbound_links = true;
function autosave(verify_success, continue_to_url) { 
  var entry_id  = $('#entry_id').val();
  var body      = encodeURIComponent($('#entry_body').val()); 
  var num_words = $('#entry_num_words').val(); 
  var num_words_at_last_autosave = $('#words_at_last_autosave').val();
  var new_words = num_words - num_words_at_last_autosave;
  var changed   = $('#changed').val();

  if (verify_success != 'losing_words_is_okay' && new_words < -30) {
     $('#losing_words').html("Uh oh!  My records show that your entry used to be longer than it currently is.  It used to be "+num_words_at_last_autosave+" words, but is now "+num_words+" words... therefore losing "+(-new_words)+" words.  To revert, cancel this box and reload this page.");
      $("#losing_words").dialog({
           bgiframe: true,
           resizable: false,
           height:250,
           modal: true,
           overlay: {
              backgroundColor: '#000',
              opacity: 0.5
           },
           buttons: {
              'Save anyway': function() {
                  $(this).dialog('close');
                  autosave('losing_words_is_okay');
               },
               Cancel: function() {
                   $(this).dialog('close');
               }
            }
      });
      $("#losing_words").dialog('open');

  } else {
      if (changed == '1') {
          $('#save_message').html('Saving');
          var img = document.createElement("IMG");
          img.src = "/images/dots-white.gif";
          document.getElementById('autosaving_indication').appendChild(img);

          $.ajax({ 
              type: "POST", 
              url: "/autosave", 
              data: "entry[id]=" + entry_id + "&entry[num_words]=" + num_words + "&entry[body]=" + body + "&v=" + verify_success + "&rv=" + $('#entry_record_version').val(), 
              dataType: 'script',
              cache: false, 
              success: function(message) {
                  var nv = $('#entry_num_words').val();
                  var sw = $('#words_at_last_autosave').val();
                  if((nv-sw)>0) {
                    $('#changed').val('1');
                  } else {
                    $('#changed').val('0');
                  }
                  if (verify_success == 'ctrls') {
                      $.achtung({message: "Force-saved it. Continue on!", 
                                 timeout:5, 
                                 icon: 'ui-icon-check',
                                 className: 'achtungSuccess'});
                  } else if (verify_success == 'losing_words_is_okay') {
                      $.achtung({message: "Saved it!", 
                                 timeout:5, 
                                 icon: 'ui-icon-check',
                                 className: 'achtungSuccess'});
                  } else if (continue_to_url) {
                      window.location = continue_to_url;
                  }
              },
              error: function(message, ajaxOptions, thrownError) {
                  $('#changed').val('1');
                  $('#save_message').html("Error saving.");
                  $.achtung({message: "Error autosaving entry. Make sure your words are saved before continuing.", 
                             timeout:5, 
                             icon: 'ui-icon-alert',
                             className: 'achtungFail'});
              }
          });
      }
  }

  // To prevent another thread running set timeout only 
  // when we do not call autosave() from within autosave().
  var s;
  if (verify_success != 'losing_words_is_okay') {
    s = setTimeout(autosave, 35000);
  }
  return false;
};


$(document).ready(function(){

    $('#entry_body').simplyCountable({
        counter: '#counter',
        hiddenField: '#entry_num_words',
        countType: 'words',
        maxCount: 750,
        strictMax: false,
        countDirection: 'up',
        safeClass: 'wordcount_under',
        overClass: 'wordcount_over',
        thousandSeparator: ','
    });
        
    $("textarea").tabby();
    $('#entry_body').autoResize({
        // On resize:
        onResize : function() {
            if ($('#entry_body')[0].selectionStart == $('#entry_body').val().length) {
                
                $.scrollTo('#footer', 0);
                
            }
        },
        // After resize:
        animateCallback : function() {
        },
        // Quite slow animation:
        animateDuration : 0,
        // More extra space: 
        extraSpace : 40,

        // Limit to how big the text area can get. Effectively no limit.
        limit : 1000000
    }).trigger('change');    
    
    $('#entry_body').focus();
    $('#entry_body').val($('#entry_body').val()+"\n");
    $('#entry_body').val($('#entry_body').val().substr(0,$('#entry_body').val().length - 1));
    $.scrollTo('#footer', 400, {});
    $('#entry_body').keyup(needsSaving);
    
    function needsSaving() {
        var changed = $('#changed').val();
        if (changed == '0') {
            $('#changed').val('1');
        }
        if ($('#seconds_left').length > 0) {
            $('#seconds_left').val(600);
        }
    }
        
    autosave();
    
    $(document).bind('keydown', function(event) {
        if ((event.which == 115 || event.which == 83) && (event.ctrlKey || event.metaKey)) {
                      $('#changed').val('1');
            autosave('ctrls');
            event.stopPropagation();  
            event.preventDefault();
            return false;
          
        } else {
          bindOutboundLinks();
        }
        return true;
    });

//   Redundant. See $(document).bind('keydown'..
//    $(window).keypress(function(event) {
//       bindOutboundLinks();
//       return true;
//    });
    
    function bindOutboundLinks() {
        $('a').click(function(event) {
            // Do not autosave when making xhr request.
            if ($(this).attr('id') == 'aes' || $(this).attr('id') == 'asl' || $(this).attr('id') == 'header-controll') {
              return true;
            };

            var c = $('#changed').val();
            var b = $('#entry_body').val();
            if (check_outbound_links != false && c == '1' && b.length > 0) {
                check_outbound_links = false;
                $.achtung({message: "Saving your entry before you go.",
                           timeout:5,
                           icon: 'ui-icon-check',
                           className: 'achtungSuccess'});

                autosave('go_to_stats', $(this).attr('href'));
                event.preventDefault();
                return false;
            }
        });
    }

    checkPace();
    function checkPace() {
        var entry_id  = $('#entry_id').val();
        var num_words = $('#entry_num_words').val().replace(/,/g,""); 
        var words_at_last_save = $('#words_at_last_save').val(); 

        if (num_words != words_at_last_save) {
            var new_words = num_words - words_at_last_save;
            $.ajax({ 
                type: "POST", 
                url: "/pace", 
                data: "entry[id]=" + entry_id + "&new_words=" + new_words + "&total_words=" + num_words, 
                cache: false, 
                success: function(message) {},
                error: function(message) {
                    $('#words_at_last_save').val(words_at_last_save);
                }
            });
        }
        var t = setTimeout(checkPace, 60000); 
    }
    
        if (google.loader.ClientLocation && $('#entry_country').val() == '') {
            var loc = google.loader.ClientLocation;
            $.ajax({ 
                type: "POST", 
                url: "/locate", 
                data: "country=" + encodeURIComponent(loc.address.country) + "&region=" + encodeURIComponent(loc.address.region) + "&city=" + encodeURIComponent(loc.address.city) + "&lat=" + loc.latitude + "&lng=" +loc.longitude, 
                cache: false, 
                success: function(message) {
                    $('#entry_country').val(loc.address.country);        
                },
                error: function(message) {}
            }); 
        }
    

    $('#header-controll').click(function(e) {
      var hc = this;

      e.preventDefault();
      $('#header').toggle('slow');
      $('#bowling-score-tally').toggle('slow', function() {
        if ($(this).css('display') === 'none') {
           $('span', hc).text('+');
        } else {
           $('span', hc).text('-');    
        }
      });
    });


  $('#months_progress img').bt({
     fill: '#F4F4F4',
     strokeStyle: '#666666', 
     spikeLength: 20,
     width: 200,
     spikeGirth: 10,
     overlap: 0,
     centerPointY: 1,
     cornerRadius: 0, 
     cssStyles: {
       fontFamily: '"Lucida Grande",Helvetica,Arial,Verdana,sans-serif', 
       fontSize: '12px',
       padding: '10px 14px'
     },
     shadow: true,
     shadowColor: 'rgba(0,0,0,.5)',
     shadowBlur: 8,
     shadowOffsetX: 4,
     shadowOffsetY: 4
  });
});
</script>


<input id="seconds_left" name="seconds_left" type="hidden" value="299" /> 
<div id="push"></div>
</div><!-- wrapper -->

  <div id="footer">
  
    <div id="entry_body_counter" class="rounded" style="width:185px;">
    <span id="save_message">Saved 0 at 02:02am</span> <span id="autosaving_indication"></span>
    <div id="counter">
    
      0 words
    
    </div>
    </div>
      <div style="font-weight: bold; line-height: 45px; padding-top: 20px;">
    
      <span class="bree logo"><a href="https://750words.com">750 Words</a></span>
      <span style="font-size: 12px; font-weight: normal;">&ndash; Private, unfiltered, spontaneous, daily</span>

    
    </div>
  
  </div><!-- footer -->


<script type="text/javascript" language="javascript">
$(document).ready(function(){
  $('li.top_menu').hover(
      function() { $('ul', this).css('display', 'block'); },
  	function() { $('ul', this).css('display', 'none'); });
  $('a.security_lock').colorbox({
      scrolling: false,
      onComplete: function() {
       $('#person_current_password').focus();
      }
  });

  $('a.edit_settings').colorbox({scrolling: false});

  

  

  

  

      // Force re-login if they've been inactive for too long
      function checkSecondsLeft() {
          var seconds_left = $('#seconds_left').val();
          if (seconds_left <= 0) {
              requireSafetyVerification();
          } else {
              var t = setTimeout(checkSecondsLeft, seconds_left * 1000); 
          }
      }

      function requireSafetyVerification() {
          $.fn.colorbox({href:"/lock/unlock_lock", 
                         overlayClose: false,
                         scrolling: false,
                         escKey: false,
                         opacity: 1,
                         onComplete: function(){ 
                              $('#person_password').focus();
                         }
          });
      }

      if ($('#seconds_left').length > 0) {
         var t = setTimeout(checkSecondsLeft, $('#seconds_left').val() * 1000); 
      }
  
      function countdownSecondsLeft() {
         $('#seconds_left').val($('#seconds_left').val()-1);
         var t = setTimeout(countdownSecondsLeft, 1000); 
      }
  
      var t = setTimeout(countdownSecondsLeft, 1000); 

      $('.beauty_title').bt({
          fill: 'rgba(250, 250, 230, .9)',
          strokeStyle: '#666666', 
          width: 150,
          spikeLength: 10,
          spikeGirth: 20,
          overlap: 0,
          centerPointY: 1,
          cornerRadius: 0, 
          cssStyles: {
              fontFamily: '"Lucida Grande",Helvetica,Arial,Verdana,sans-serif', 
              fontSize: '12px',
              padding: '10px 14px'
            },
          shadow: true,
          shadowColor: 'rgba(0,0,0,.5)',
          shadowBlur: 8,
          shadowOffsetX: 4,
          shadowOffsetY: 4,
          positions: ['right','bottom']
      });    
});

var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

try {
  var pageTracker = _gat._getTracker("UA-12069949-1");
  pageTracker._trackPageview();
} catch(err) {}


var _sf_async_config={uid:3843,domain:"750words.com"};
(function(){
  function loadChartbeat() {
    window._sf_endpt=(new Date()).getTime();
    var e = document.createElement('script');
    e.setAttribute('language', 'javascript');
    e.setAttribute('type', 'text/javascript');
    e.setAttribute('src',
       (("https:" == document.location.protocol) ? "https://s3.amazonaws.com/" : "http://") +
       "static.chartbeat.com/js/chartbeat.js");
    document.body.appendChild(e);
  }
  var oldonload = window.onload;
  window.onload = (typeof window.onload != 'function') ?
     loadChartbeat : function() { oldonload(); loadChartbeat(); };
})();

</script>


</body>
</html>