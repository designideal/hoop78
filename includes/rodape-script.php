	
   		
   	<script src="<?php echo ROOT?>js/vendor/jquery.js"></script>
    <script src="<?php echo ROOT?>js/foundation.min.js"></script>
	<script src="<?php echo ROOT?>js/jquery.ajaxSubmit.js"></script>
	<script src="<?php echo ROOT?>js/valida.js"></script>
    <script>
      $(document).foundation();
	  $(document).ready(function() {
			$(".voltarTopo").hide();
		
			$(window).scroll(function () {
				if ($(this).scrollTop() > 2000) {
					$('.voltarTopo').fadeIn();
				} else {
					$('.voltarTopo').fadeOut();
				}
			});
			$('.voltarTopo').click(function() {
				$('body,html').animate({scrollTop:0},600);
			}); 
	  });
    </script>


<!-- MailerLite Universal -->
<script>
(function(m,a,i,l,e,r){ m['MailerLiteObject']=e;function f(){
var c={ a:arguments,q:[]};var r=this.push(c);return "number"!=typeof r?r:f.bind(c.q);}
f.q=f.q||[];m[e]=m[e]||f.bind(f.q);m[e].q=m[e].q||f.q;r=a.createElement(i);
var _=a.getElementsByTagName(i)[0];r.async=1;r.src=l+'?v'+(~~(new Date().getTime()/1000000));
_.parentNode.insertBefore(r,_);})(window, document, 'script', 'https://static.mailerlite.com/js/universal.js', 'ml');

var ml_account = ml('accounts', '992844', 'x4e5s7q9e0', 'load');
</script>
<!-- End MailerLite Universal -->


    
<!--GOOGLE ANALYTICS    -->
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-879149-68', 'auto');
  ga('send', 'pageview');

</script>    

<!--MESSENGER -->

<script>
      window.fbMessengerPlugins = window.fbMessengerPlugins || {
        init: function () {
          FB.init({
            appId            : '1678638095724206',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v2.10'
          });
        }, callable: []
      };
      window.fbAsyncInit = window.fbAsyncInit || function () {
        window.fbMessengerPlugins.callable.forEach(function (item) { item(); });
        window.fbMessengerPlugins.init();
      };
      setTimeout(function () {
        (function (d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) { return; }
          js = d.createElement(s);
          js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      }, 0);
      </script>
      
      <div
        class="fb-customerchat"
        page_id="1080405815413142"
        ref="">
      </div>
    

  


        <!--LINK EXTERNO ANALYTICS-->
        
        
		<script>
		/**
		* Função que acompanha um clique em um link externo no Analytics.
		* Essa função processa uma string de URL válida como um argumento e usa essa string de URL
		* como o rótulo do evento. Ao definir o método de transporte como 'beacon', o hit é enviado
		* usando 'navigator.sendBeacon' em um navegador compatível.
		*/
		var trackOutboundLink = function(url) {
		   ga('send', 'event', 'outbound', 'click', url, {
			 'transport': 'beacon',
			 'hitCallback': function(){window.open(url,"_blank");}
		   });
		}
		</script>        
        