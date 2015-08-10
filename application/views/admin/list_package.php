<section id="main-content">
    <section class="wrapper">
    <!-- page start-->
        <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading"><?php echo $this->lang->line('list_packages');?>
                    
                    <span class="tools pull-right">
                        <a href="<?php echo base_url();?>index.php/admin/add_package/"><?php echo $this->lang->line('add_package');?></a>
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-cog"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <h2><?php echo $this->lang->line('list_packages');?></h2>
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th><?php echo $this->lang->line('pkg_name');?></th>
                            <th><?php echo $this->lang->line('pkg_dept_date');?></th>
                            <th><?php echo $this->lang->line('pkg_arr_date');?></th>
                            <th><?php echo $this->lang->line('status');?></th>
                            <th><?php echo $this->lang->line('featured');?></th>
                            <th><?php echo $this->lang->line('action');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i=1;
                        foreach($package as $p){?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="hidden-phone"><?php echo $p['package_title'];?></td>
                            <td><?php $dept_arr=explode('-',$p['dept_date']);
                                echo $dept_date=$dept_arr[1].'/'.$dept_arr[0].'/'.$dept_arr[2];
                            ?></td>
                            <td><?php $ar_arr=explode('-',$p['arr_date']);
                                echo $arr_date=$ar_arr[1].'/'.$ar_arr[0].'/'.$ar_arr[2];
                            ?></td>
                            <td>
                                <a href="#" class="status" data-id="<?php echo $p['package_id'];?>" data-status="<?php echo $p['is_active'];?>"><span id="spn_<?php echo $p['package_id'];?>"><?php if($p['is_active']=='Y'){?>Active<?php }else{ ?>Inactive<?php } ?></span></a>
                            </td>
                            <td><a href="#" class="featured" data-id="<?php echo $p['package_id'];?>" data-status="<?php echo $p['is_featured'];?>"><span id="fe_<?php echo $p['package_id'];?>"><?php if($p['is_featured']=='Y'){?>YES<?php }else{ ?>NO<?php } ?></span></a></td>
                            <td><a href="<?php echo base_url();?>index.php/admin/view_package/<?php echo $p['package_id'];?>"><span class="fa fa-info"></span></a>&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/admin_package/add_package/<?php echo $p['package_id'];?>"><span class="fa fa-pencil"></span></a>&nbsp;&nbsp;
                                <a href="#"  class="del" data-id=<?php echo $p['package_id'];?>><span class="fa fa-minus"></span></a>
                            </td>
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
        $(".status").click(function(){
            var package_id=$(this).data('id');
            var curr_stat=$(this).data('status');
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>index.php/admin_package/change_status",
                data:{'package_id':package_id,'curr_stat':curr_stat},
                dataType:"json",
                success:function(data){
                    $("#spn_"+package_id).text(data.result);
                    if(curr_stat=='Y')
                        $(this).attr('data-status','N');
                    else
                        $(this).attr('data-status','Y');    
                }
            }); 
        
        });
    </script>
    <script type="text/javascript">
        $(".featured").click(function(){
            var package_id=$(this).data('id');
            var curr_stat=$(this).data('status');
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>index.php/admin_package/change_featured",
                data:{'package_id':package_id,'curr_stat':curr_stat},
                dataType:"json",
                success:function(data){
                    $("#fe_"+package_id).html(data.result);
                    if(curr_stat=='Y')
                        $(this).attr('data-status',"N");
                    else
                        $(this).attr('data-status',"Y");
                }
            }); 
        
        });
    </script>
    <script type="text/javascript">
        $(".del").click(function(){
            var package_id=$(this).data('id');
            r=confirm("<?php echo $this->lang->line('are_u_sure_delete');?>");
            if(r==true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>index.php/admin_package/del_package",
                data:{'package_id':package_id},
                dataType:"json",
                success:function(data){
                    if(data.result==1){
                        window.location="<?php echo base_url();?>index.php/admin/list_package";
                    }
                }
                
            });
          } 
        });
    </script>
    