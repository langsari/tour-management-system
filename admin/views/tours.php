<script type="text/javascript" src="../js/jquery/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/ddimgtooltip.css" />

<script language="javascript" type="text/javascript">
var ddimgtooltip={

	tiparray:function(){
		var tooltips=[]
		
<?php
$n=0;
while($row = mysql_fetch_assoc($result)){
	echo "tooltips[$n]=[\"../banners/$row[banner]\"]\r\n";
	$n++;
}
?>
		return tooltips //do not remove/change this line
	}(),

	tooltipoffsets: [20, -30], //additional x and y offset from mouse cursor for tooltips

	//***** NO NEED TO EDIT BEYOND HERE

	tipprefix: 'imgtip', //tooltip ID prefixes

	createtip:function($, tipid, tipinfo){
		if ($('#'+tipid).length==0){ //if this tooltip doesn't exist yet
			return $('<div id="' + tipid + '" class="ddimgtooltip" />').html(
				'<div style="text-align:center"><img src="' + tipinfo[0] + '" /></div>'
				+ ((tipinfo[1])? '<div style="text-align:left; margin-top:5px">'+tipinfo[1]+'</div>' : '')
				)
			.css(tipinfo[2] || {})
			.appendTo(document.body)
		}
		return null
	},

	positiontooltip:function($, $tooltip, e){
		var x=e.pageX+this.tooltipoffsets[0], y=e.pageY+this.tooltipoffsets[1]
		var tipw=$tooltip.outerWidth(), tiph=$tooltip.outerHeight(), 
		x=(x+tipw>$(document).scrollLeft()+$(window).width())? x-tipw-(ddimgtooltip.tooltipoffsets[0]*2) : x
		y=(y+tiph>$(document).scrollTop()+$(window).height())? $(document).scrollTop()+$(window).height()-tiph-10 : y
		$tooltip.css({left:x, top:y})
	},
	
	showbox:function($, $tooltip, e){
		$tooltip.show()
		this.positiontooltip($, $tooltip, e)
	},

	hidebox:function($, $tooltip){
		$tooltip.hide()
	},


	init:function(targetselector){
		jQuery(document).ready(function($){
			var tiparray=ddimgtooltip.tiparray
			var $targets=$(targetselector)
			if ($targets.length==0)
				return
			var tipids=[]
			$targets.each(function(){
				var $target=$(this)
				$target.attr('rel').match(/\[(\d+)\]/) //match d of attribute rel="imgtip[d]"
				var tipsuffix=parseInt(RegExp.$1) //get d as integer
				var tipid=this._tipid=ddimgtooltip.tipprefix+tipsuffix //construct this tip's ID value and remember it
				var $tooltip=ddimgtooltip.createtip($, tipid, tiparray[tipsuffix])
				$target.mouseenter(function(e){
					var $tooltip=$("#"+this._tipid)
					ddimgtooltip.showbox($, $tooltip, e)
				})
				$target.mouseleave(function(e){
					var $tooltip=$("#"+this._tipid)
					ddimgtooltip.hidebox($, $tooltip)
				})
				$target.mousemove(function(e){
					var $tooltip=$("#"+this._tipid)
					ddimgtooltip.positiontooltip($, $tooltip, e)
				})
				if ($tooltip){ //add mouseenter to this tooltip (only if event hasn't already been added)
					$tooltip.mouseenter(function(){
						ddimgtooltip.hidebox($, $(this))
					})
				}
			})

		}) //end dom ready
	}
}

//ddimgtooltip.init("targetElementSelector")
ddimgtooltip.init("*[rel^=imgtip]")
</script>

<div id="wrapper" align="center">
  <div id="row_space_1"></div>
  <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="?m=tours&v=tours">
      <h1>Search tours</h1>
      <p>You can type any keyword of tour program then click search button.</p>
      <label>Keyword <span class="small">Type your keyword</span></label>
      <input type="text" name="keyword" id="keyword" value="<?=$keyword?>" />
      <button type="submit">Search</button>
      <div class="spacer"></div>
    </form>
  </div>
  <div id="row_space_2"></div>
  <div class="div-table-tours">
  	<div class="div-table-caption">Customer Managagement</div>
    <div class="div-table-operation"><a href="?m=tourfrm&v=tourfrm"><img src="../images/add.png" border="0" align="absmiddle" /> Add New</a></div>
    <div class="div-table-row">
      <div class="div-table-title-edit">No.</div>
      <div class="div-table-tour-title-title">Tour</div>
      <div class="div-table-title-edit">Days</div>
      <div class="div-table-tour-title-program">Program</div>
      <div class="div-table-title-edit">Trip</div>
      <div class="div-table-title-edit">Banner</div>
      <div class="div-table-title-edit">Doc</div>
      <div class="div-table-title-edit">Edit</div>
      <div class="div-table-title-edit">Del</div>
    </div>
<?php
if(mysql_num_rows($result) > 0){
	mysql_data_seek($result,0);
	$n=1;
	while($row = mysql_fetch_assoc($result)){
?>
    <div class="div-table-row">
      <div class="div-table-data-edit"><?=$n?>.</div>
      <div class="div-table-tour-data-title"><?=$row[title]?></div>
      <div class="div-table-data-edit"><?=$row[num_date]?></div>
      <div class="div-table-tour-data-program"><a title="Tour program management" href="?m=program&v=program&tour_id=<?=$row[tour_id]?>"><img src="../images/application_view_list.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-edit"><a title="Trip management" href="?m=trip&v=trip&tour_id=<?=$row[tour_id]?>"><img src="../images/application_view_icons.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-edit"><a href="#" class="toTop" rel="imgtip[<?=$n-1?>]"><img src="../images/magnifier_zoom_in.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-edit"><a title="Document" href="../docs/<?=$row[doc]?>" target="_new"><img src="../images/page_white_acrobat.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-edit"><a href="?m=tourfrm&v=tourfrm&tour_id=<?=$row[tour_id]?>"><img src="../images/pencil.png" border="0" align="absmiddle" /></a></div>
      <div class="div-table-data-edit"><a href="?m=tourdel&tour_id=<?=$row[tour_id]?>" onclick="return confirm('Do you want to delete <?=$row[title]?>?');"><img src="../images/delete.png" border="0" align="absmiddle" /></a></div>
    </div>
<?php
		$n++;
	}
}
?>
  </div>
  <div class="div-page-tours">
  <div id="page">Page <?php
  		$numpage = ceil($numpro/$pl);
		for($i=1;$i<=$numpage;$i++){
			if($pn==$i){
				echo $i." ";
			}else{
				echo "<a href=\"?m=tours&v=tours&pn=$i&keyword=$keyword\">".$i."</a> ";
			}
		}
		?></div>
  </div>
</div>