

	<!-- PROPERTY 1 : begin -->
	
	<?php
	 $i=1; 
	 if($filter!='')
	 {
	 	$filter_arr=explode('~',$filter);
	 }	
	 foreach($package as $p){
	 $class='property';
	 
	 if($i==1){
	 	$class=$class.' first-in-row odd';
	 }
	 if($i%3==0)
	 {
	 	$class=$class.' odd';
	 }
	 $flag=0;
	 if(!empty($filter_arr)){
	 	foreach($filter_arr as $k=>$v){
			$a_arr=explode('~',$p['amenities']);
			if(in_array($v,$a_arr)){
				$flag=1;
				break;
			}
		}
		
	 
	 }else{
	 	$flag=1;
	 }
	 
	 ?>
	<?php if($flag==1){?> 
	<li class="<?php echo $class;?>">
		<a href="#" class="property-thumb">
			<img src="<?php echo base_url();?>uploads/<?php echo $p['is_featured_image'];?>" alt="">
			<span class="overlay"><span><i class="fa fa-search"></i> View More</span></span>
		</a>
		<div class="property-content">
			<h4 class="property-title"><a href="<?php echo base_url();?>index.php/package/package_details/<?php echo $p['package_id'];?>"><?php echo stripslashes($p['package_title']);?></a></h4>
			<h5 class="property-location"><?php echo $p['package_country'];?></h5>
			<p class="property-description"><?php echo substr(stripslashes($p['package_desc']),0,120);?></p>
															<div class="property-price-rating">
				<div class="property-price"><strong>$ <?php echo $p['total_cost'];?></strong></div>
				<!--<div class="property-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
-->												</div>
			<button class="button submit-btn reserve"  data-package="<?php echo $p['package_id'];?>"><i class="fa fa-check"></i> Make Reservation</button>	
		</div>
	</li>
	<?php } ?>
	<?php 
	
	$i++;
	if($i%4==0){
		$i=1;
	}
	} ?>
	<!-- PROPERTY 1 : end -->
	<script type="text/javascript">
	$(".reserve").click(function(e){
		var country_id=$("#country_id").val();
		var arr_date=$("#arr_date").val();
		alert(arr_date);
		var dept_date=$("#dept_date").val();
		var adults=$("#adult").val();
		var children=$("#children").val();
		var package_id=$(this).data('package');
		var param=package_id+'/'+country_id+'/'+encodeURI(arr_date)+'/'+encodeURI(dept_date)+'/'+adults+'/'+children;
		
		window.location="<?php echo base_url();?>index.php/package/book_my_package/"+param;
	});
</script>

										