<div class="content-box"><!-- Start Content Box -->
    
    <div class="content-box-header">
        
        <h3><?=$heading?></h3>
        
        <ul class="content-box-tabs">
            <li><a href="<?=site_url('users/index')?>" class="default-tab">List</a></li> <!-- href must be unique and match the id of target div -->
            <li><a href="<?=site_url('users/add')?>">Add Users</a></li>
        </ul>
        
        <div class="clear"></div>
        
    </div> <!-- End .content-box-header -->
    
    <div class="content-box-content">
        <?php if($this->session->userdata('message')){ ?>
        <div class="notification success png_bg">
                        <a href="#" class="close"><img src="<?=base_url()?>resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div><?=$this->session->userdata('message')?></div>
        </div>
        <?php } 
	        $this->session->unset_userdata('message');
        ?>
        <div class="tab-content default-tab" id="tab1"> 
            <table>
                
                <thead>
                    <tr>
                       <th><input class="check-all" type="checkbox" /></th>
                       <th>Sr.No</th>
                       <th>Name</th>
                       <th>Username</th>
                       <th>Password</th>
                       <th>Action</th>
                    </tr>
                </thead>
             	<tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="bulk-actions align-left">
                                <a class="button" href="#" id="apply">Delete Selected</a> &nbsp;
                                <a class="button" href="<?=site_url('users/excel')?>" id="excel">Export To Excel</a>
                            </div>
                            
                           <!--  <div class="pagination">
                                <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
                                <a href="#" class="number" title="1">1</a>
                                <a href="#" class="number" title="2">2</a>
                                <a href="#" class="number current" title="3">3</a>
                                <a href="#" class="number" title="4">4</a>
                                <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
                            </div> End .pagination -->
                            <div class="clear"></div>
                        </td>
                    </tr>
                </tfoot>
             
                <tbody>
                    <?php $i = 1; foreach($users as $c){ ?>
                    <tr>
                        <td><input type="checkbox" class="checking" id="<?=$c->id?>" /></td>
                        <td><?=$i?></td>
                        <td><?=$c->name?></td>
                        <td><?=$c->username?></td>
                        <td><?=$c->password?></td>
                        <td>
                             <a href="<?=site_url('users/edit/'.$c->id)?>" title="Edit"><img src="<?=base_url()?>resources/images/icons/pencil.png" alt="Edit" /></a>
                             <a href="javascript:conf('<?=site_url('users/delete/'.$c->id)?>')" title="Delete"><img src="<?=base_url()?>resources/images/icons/cross.png" alt="Delete" /></a> 
                        </td>
                    </tr>
                    <? $i++; } ?>
                </tbody>
                
            </table>
            
        </div> <!-- End #tab1 -->
                
    </div> <!-- End .content-box-content -->
    
</div> <!-- End .content-box -->
<script type="text/javascript">
	function conf(url){
		var c = confirm('Are you sure you want to delete this user?');
		if(c == true){
			location.href = url;	
		} else {
			return false;	
		}
	}
</script>