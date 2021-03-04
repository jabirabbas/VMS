<div class="content-box"><!-- Start Content Box -->
    
    <div class="content-box-header">
        
        <h3><?=$heading?></h3>
        
        <ul class="content-box-tabs">
            <li><a href="<?=site_url('visitors/index')?>" class="default-tab">List</a></li> <!-- href must be unique and match the id of target div -->
            <li><a href="<?=site_url('visitors/add')?>">Add Visitor</a></li>
            <li><a href="javascript:$('#searchbar').slideToggle('fast');">Search</a></li>
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
        	<div id="error" class="notification error png_bg" style="display:none;">
				<a href="#" class="close"><img src="<?=base_url()?>resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                <div><?=$this->session->flashdata('error')?></div>
            </div>
            
        	<div id="searchbar" align="center" style="display:none; font:13px ptsans-regular; border-bottom:1px dashed #dedede; margin-bottom:25px; padding-bottom:10px; padding-left:10px">
            	<form action="<?=site_url('visitors/search')?>">
                    Name : <input type="text" class="text-input small-input" name="search_name" /> &nbsp;&nbsp;&nbsp;&nbsp;
                    Company : <input type="text" class="text-input small-input" name="search_company" /> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="button" type="submit" value="Search" />
                </form>
            </div>
            <table>
                
                <thead>
                    <tr>
                       <th><input class="check-all" type="checkbox" /></th>
                       <th>Sr.No</th>
                       <th>Name</th>
                       <th>Company</th>
                       <th>Email</th>
                       <th>Mobile</th>
                       <th>Action</th>
                    </tr>
                </thead>
             	<tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="bulk-actions align-left">
                                <a class="button" href="#" id="apply">Delete Selected</a> &nbsp;
                                <a class="button" href="<?=site_url('visitors/excel')?>" id="excel">Export To Excel</a>
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
                    <?php $i = 1; foreach($visitors as $c){ ?>
                    <tr>
                        <td><input type="checkbox" class="checking" id="<?=$c->id?>" /></td>
                        <td><?=$i?></td>
                        <td><?=$c->title.'. '.$c->firstname.' '.$c->lastname?></td>
                        <td><?=$c->company?></td>
                        <td><a href="mailto:<?=$c->email?>"><?=$c->email?></a></td>
                        <td><?=$c->mobile?></td>
                        <td>
                             <a href="<?=site_url('visitors/edit/'.$c->id)?>" title="Edit"><img src="<?=base_url()?>resources/images/icons/pencil.png" alt="Edit" /></a>
                             <a href="javascript:conf('<?=site_url('visitors/delete/'.$c->id)?>')" title="Delete"><img src="<?=base_url()?>resources/images/icons/cross.png" alt="Delete" /></a> 
                             <a href="javascript:window.open('<?=site_url('visitors/printCard/'.$c->id)?>','Print Visiting Card', 'width=500, height=600, toolbar=no, status=no')" title="Print"><img width="16" src="<?=base_url()?>resources/images/icons/print.png" alt="Print" /></a> 
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
		var c = confirm('Are you sure you want to delete this visitor?');
		if(c == true){
			location.href = url;	
		} else {
			return false;	
		}
	}

<?php if($this->session->userdata('error')){ ?>
	$("#searchbar").show();
<?php } ?>
</script>