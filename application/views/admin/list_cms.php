<section id="main-content">
    <section class="wrapper">
    <!-- page start-->
        <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo $this->lang->line('list_cms_page');?>
                    <span class="tools pull-right">
					    <a href="<?php echo base_url();?>index.php/admin/add_amenities/"><?php echo $this->lang->line('add_cms_page');?></a>
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-cog"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <h2><?php echo $this->lang->line('list_cms_page');?></h2>
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th width="50"> #</th>
                            <th><?php echo $this->lang->line('page_name');?></th>
                            <th width="100"><?php echo $this->lang->line('action');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
						$i=1;
						foreach($cms as $c){?>
						<tr>
                            <td><?php echo $i;?></td>
                            <td class="hidden-phone"><?php echo stripslashes($c['cms_page_name']);?></td>
                           <td><a href="<?php echo base_url();?>index.php/cms/add_cms/<?php echo $c['cms_id'];?>"><span class="fa fa-pencil"></span></a>&nbsp;&nbsp;<a href="#"  class="del" data-id=<?php echo $c['cms_id'];?>><span class="fa fa-minus"></span></a></td>
                        </tr>
                        <?php 
							$i++;
						} ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
        
                <!-- page end-->
    </section>
</section>
	
	
	<script type="text/javascript">
		$(".del").click(function(){
			var am_id=$(this).data('id');
			r=confirm("<?php echo $this->lang->line('are_u_sure_delete');?>");
			if(r==true){
			$.ajax({
				type:"POST",
				url:"<?php echo base_url();?>index.php/cms/del_cms",
				data:{'am_id':am_id},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						window.location="<?php echo base_url();?>index.php/cms/list_cms";
					}
				}
			});
		  }	
		});
	</script>
	