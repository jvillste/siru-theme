<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

    <head>
        
        <?php print $head; ?>
        <title><?php print $head_title; ?></title>
        <?php print $styles; ?>
        <?php print $scripts; ?>
        <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
		<script type="text/javascript" src="<?php print base_path() . path_to_theme() . '/javascript/jquery-1.4.3.min.js' ?>"></script>


		<script type="text/javascript">
		   $(window).load(function() {
				   var highestCol = Math.max($('#left-menu-upper-part').height(),$('#content').height(),$('#right_region').height()+20);
					//alert('highest ' + highestCol + ' #left-menu-upper-part ' +  $('#left-menu-upper-part').height() +  ' #content ' + $('#content').height()+ ' ' + $('#right_region').height());
							
				   $('#left-menu-lower-spacer').height(Math.max(20,highestCol - $('#left-menu-upper-part').height()));

				   var highestCol2 = Math.max($('#left-menu-upper-part').height() + $('#left-menu-lower-spacer').height(),$('#content').height(),$('#right_region').height()+20);
					
				   $('#right-edge-middle').height(highestCol2-23);

				   $('#main-menu-right-spacer').width(720 - $('#main-menu').width());
			   });		
		</script>
		
        <style type="text/css">
            #page{
                position:relative;
                margin-left:auto;
                margin-right:auto;
                width:920px;
            }
            #logo{
                float:right;
                clear:both;
                margin-bottom:25px;
                margin-top: 30px;
                margin-right: 80px;
            }

            #top-left-corner{
                clear:both;
                float:left;
                width:142px;
                height:27px;
            }

            #main-menu-spacer {
                float: left;
                width: 20px;
                height: 27px;
            }

             #main-menu-right-spacer {
                float: left;
                border-bottom: 2px solid;
                width: 2px;
                height: 27px;
            }

            #main-menu{
                float:left;
            }

            #content{
                float:left;

            }

            #right_region
            {
                float:left;
                padding-top:20px;
                width:237px;
            }

            #left-menu-spacer {
                width:142px;
                height:20px;
            }
            #left-menu-lower-spacer {
                border-right: 2px solid;
                clear:both;
                width:142px;
                height:800px;
            }

            #left-menu{
                float:left;
                clear:both;
            }

            #login-link
            {
                clear:both;
                float:right;
                font-size:12px;
            }
            
            #lehdet
            {
                position:absolute;
                left:-50px;
                z-index:-1;
            }

            #top-left-round-corner
            {
                width:22px;
                height:25px;
                float:left;
                margin-left:-2px;
                margin-top:-2px;
            }
            
            #top-right-round-corner
            {
                width:25px;
                height:25px;
                margin-right:-2px;
                margin-top:-2px;
            }
            
            #right-edge
            {
            	float:left;
            }
            
            #right-edge-middle
            {
            	border-right: 2px solid;
            	width:23px;
            	height:200px;
            }
            
            #bottom-edge
            {
            	clear:both;
            }
            
            #bottom-edge-left-spacer
            {
	            height:25px;
	            width:144px;
	            float:left;
            }
            
            #bottom-left-round-corner
            {
                width:25px;
                height:25px;
                float:left;
                margin-left:-2px;
                margin-bottom:-2px;
            }
            
            #bottom-edge-middle
            {
            	width:714px;
            	height:23px;
            	 float:left;
            	 border-bottom: 2px solid;
            }
             #bottom-right-round-corner
            {
                width:25px;
                height:25px;
                float:left;
                margin-right:-2px;
                margin-bottom:-2px;
            }
            
            
            #top-edge
            {
                float:left;
                height:23px;
                width:400px;
                background: white;
            }
            
            #left-edge
            {
                float:left;
                width:7px;
                clear:both;
                height:0px;
            }

            #page-content
            {
                float:left;
                padding-left:50px;
                padding-right:50px;
                padding-top:20px;
                width:400px;
                background:white;
                min-height:700px;
                font-size:12px;
            }

			.feed-link
			{
				float:right;
			}

			#linkki-ikonit
			{
				margin-top:20px;
				float:right;
			}
			
			#vihreat
            {
                width:140px;
                float:right;
                clear:both;
                margin-top:-5px;

            }
            
            .kehu, .kehu-allekirjoitus
            {
            	clear:both;
            	
            	font-size:12px;
            	margin-top:20px;
            }
            
            .kehu-allekirjoitus
            {
            	margin-top:5px;
            	margin-bottom:10px;
            	float:right;
            		
            	font-style:italic;
            	
            }
            
            .twitter
            {
            	font-size:12px;
                clear:both;
                padding-top:20px;
            }
            
            .twitter-otsikko
            {
                  color: black;
				    font-weight: bold;
				    margin-left: 5px;
				    vertical-align: 40%;
            }
            .tweet-listaus
            {
                clear:both;
                padding-top:5px;
            }
            
            .flags
            {
            	float: right;
            	margin-bottom:20px;
            }
        </style>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-21093838-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
    </head>

    <body  class="<?php print $body_classes; ?>">

        <div id="page">
            <img id="lehdet" src="<?php print base_path() . path_to_theme() . '/images/lehdet_big.jpg' ?>" alt="" />
            <a href="/" ><img id="logo" src="<?php print base_path() . path_to_theme() . '/images/header-brown.png' ?>" alt="" /></a>
            <div style="clear:both;" ></div>
            <div id="top-left-corner"></div>
            <div id="main-menu-spacer"></div>
            <div id="main-menu">
                <?php print $top_menu ?>
            </div>
            <div id="main-menu-right-spacer"></div>

            <div id="left-menu">
            	<div id="left-menu-upper-part" style="width:144px">
	                <div id="left-menu-spacer"></div>
	                <?php print $left_menu; ?>
	                <div style="clear:both;" ></div>
                </div>
                <div id="left-menu-lower-spacer"></div>
            </div>

            <div id="content">
                <div id="top-left-round-corner"></div>
                <div id="top-edge"></div>
                <div style="clear:both;" ></div>
                
                <div id="page-content">
                    <?php print $debug; ?>
                    <?php print $feed_link; ?>
                    <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
                    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
                    <?php if ($node->type == 'aloite' || $node->type == 'story'): ?>
			<div class="page_list_date_div"> <span class="page_list_date"><?php print format_date($node->created,'custom','j.n.Y') ?></span></div>
			<div class="like_div">
				<script src="http://connect.facebook.net/fi_FI/all.js#xfbml=1"></script><fb:like layout="button_count" show_faces="false" width="100"></fb:like>

				<iframe allowtransparency="true" frameborder="0" scrolling="no"
				        src="https://platform.twitter.com/widgets/tweet_button.html?lang=fi"
				        style="width:100px; height:20px;">
				</iframe>
			</div>
			<div style="clear:both;"></div>
  		    <?php endif; ?>
                    <?php if ($title): print '<h1'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h1>'; endif; ?>
                    <?php if ($show_messages && $messages): print $messages; endif; ?>
                    <?php print $help; ?>
                    <?php print $content ?>
                    <?php if ($node->type == 'aloite'): print '<a style="text-decoration:underline" href="/node/80">&lt;- Takaisin aloitelistaan</a>'; endif; ?>
                    <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
                    <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
                   
                </div>
                
            </div>

            <div id="right_region">
                <div class="flags">
	                <a href="/"><img src="<?php print base_path() . path_to_theme() . '/images/fi.jpg' ?>" alt="" /></a>
	                <a href="/sv/node/729"><img src="<?php print base_path() . path_to_theme() . '/images/sv.jpg' ?>" alt="" /></a>
                </div>
                <div style="clear:both" ></div>
                <?php print $search_box; ?>
                <div style="clear:both" ></div>
                <?php //print $feed_icons ?>
                <?php if ($right_image): print '<img src="'. $right_image .'" />'; endif; ?>
		<a href="https://lahjoita.vihreat.fi/lahjoita/henkilolle/sirpa-siru-kauppinen">
		  <img style="margin-top:5px" src="/sites/all/themes/siru/images/tue-eurovaalikampanjaa.png" />
		</a>
                <?php print $right ?>
                
				<div id="linkki-ikonit">
					<a href="http://www.vihreat.fi/sirpa.kauppinen" ><img id="vihreat" src="<?php print base_path() . path_to_theme() . '/images/vihreat.gif' ?>" alt="" /></a>
           	      <a style="float:right" href="http://twitter.com/SiruKauppinen" >
	                <img src="<?php print base_path() . path_to_theme() . '/images/twitter.jpg' ?>" alt="" />
	              </a>

	                <a style="float:right;margin-right:5px;" href="http://www.facebook.com/sirpa.kauppinen" >
	                	<img src="<?php print base_path() . path_to_theme() . '/images/facebook.jpg' ?>" alt="" />
	                </a>

	                <a style="float:right;margin-right:5px;" href="/blog/rss-kaikki" >
	                	<img src="/misc/feed.png" alt="" />
	                </a>
                </div>
                
                <div style="clear:both" ></div>
                <div class="kehu">
	              "Tunnen Sirun hyvin vihreiden puoluehallituksen työstä.
	              Siru olisi erinomainen kansanedustaja, hän toisi eduskuntaan uutta virtaa.
                  Hän on aktiivinen, suorapuheinen ja luova ja hänellä on todella hyvä asiantuntemus 
                  ympäristöpolitiikassa."
            	</div>
            	 <div class="kehu-allekirjoitus">
            	 -Anni Sinnemäki
            	 </div>
            	 
            	<div class="kehu">
	             "Olen tutustunut Siruun mm. Vihreiden elinkeinopoliittisesa
				työryhmässä. Siru on vihreän talouden asiantuntija, jolla on näkemystä
				niin pk-yritysten toimintaedellytysten parantamisesta kuin
				yhteiskuntamme isoista tulevaisuuden haasteistakin. Hänellä on myös
				kykyä etsiä toimiva ratkaisuja. Tällaisia päättäjiä Suomi  tarvitsee."
            	</div>
            	 <div class="kehu-allekirjoitus">
            	 -Ville Niinistö
            	 </div>
				 
				 <div class="kehu">
	             "Tunnen Sirun pitkältä ajalta ja voin suositella häntä lämpimästi mitä
			     vaativimpiin valtiollisiin tehtäviin."
            	</div>
            	 <div class="kehu-allekirjoitus">
            	 -Heidi Hautala
            	 </div>
				 
				<div class="kehu">
	             "Siru on tarmonpesä, jolla on laaja asiantuntemus ja kyky keksiä luovia ratkaisuja."
            	</div>
            	 <div class="kehu-allekirjoitus">
            	 -Satu Hassi
            	 </div>
				 
				 <object style="width: 237px; height: 191px;" data="http://www.youtube.com/v/F2r_1aIkvC8" type="application/x-shockwave-flash">
				  <param name="data" value="http://www.youtube.com/v/F2r_1aIkvC8" />
				  <param name="src" value="http://www.youtube.com/v/F2r_1aIkvC8" />
				</object>
				 <div class="kehu-allekirjoitus">
            	 -Pekka Haavisto
            	 </div>
            	 <div class="twitter">
            	 </div>
            </div>
            <div id="right-edge">
            	<div id="top-right-round-corner"></div>
            	<div id="right-edge-middle"></div>
            </div>
            
            <div id="bottom-edge">
            	<div id="bottom-edge-left-spacer"></div>
            	<div id="bottom-left-round-corner"></div>
            	<div id="bottom-edge-middle"></div>
            	<div id="bottom-right-round-corner"></div>
            </div>
            
            <?php print $footer_message . $footer ?>
        </div>
        <div id="login-link"><a class="login-link" href="<?php print base_path() ?>user">Ylläpito</a></div>

        <?php print $closure; ?>
        
        
    </body>
</html>
