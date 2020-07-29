<link rel="stylesheet" href="css/galleriffic-2.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.galleriffic.js"></script>
<script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
<div id="wrapper" align="center">
	<div style="width:950px; margin-top:30px;">
    
    
    <div id="page">
          <div id="container">
            <!-- Start Advanced Gallery Html Containers -->
            <div id="gallery" class="content">
              <div id="controls" class="controls"></div>
              <div class="slideshow-container">
                <div id="loading" class="loader"></div>
                <div id="slideshow" class="slideshow"></div>
              </div>
              <div id="caption" class="caption-container"></div>
            </div>
            <div id="thumbs" class="navigation">
              <ul class="thumbs noscript">
<?php
while($fg=mysql_fetch_assoc($result)){
	echo '<li><a class="thumb" href="images/galleriffic-gallery/'.$fg[photo].'" title="'.$fg[alt].'"> <img src="images/galleriffic-gallery/thumb/'.$fg[thumb].'" alt="'.$fg[alt].'" /></a></li>';
}
?>
              </ul>
            </div>
            <div style="clear: both;"></div>
          </div>
        </div><script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '400px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 20,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
		</script>
    
    </div>
</div>