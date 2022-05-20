<div class="form_search">
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
<input type="text" name="s" id="s"  class="input_searchbox" <?php if(is_search()) { ?>value="<?php the_search_query(); ?>" <?php } else { ?>value="Enter keywords &hellip;" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"<?php } ?> />

<a class="sliderBtn" href="#" id="searchbtn">Search</a>
<input type="submit" id="searchsubmit"  value="Search" hidden />
</form>
</div>
<script type="text/javascript">
jQuery('document').ready(function(){
	jQuery('.form_search #searchbtn').click(function(){
		jQuery('form#searchform').submit();
	})
})
</script>