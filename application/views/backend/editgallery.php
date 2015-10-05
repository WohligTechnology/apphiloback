<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit Gallery</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editgallerysubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

            <div class="row">
            <div class="input-field col s6">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo set_value('name',$before->name);?>">
            </div>
        </div> 
           <div class="row">
            <div class="input-field col s6">
                <label>Order</label>
                <input type="text" name="order" value="<?php echo set_value('order',$before->order);?>">
            </div>
        </div>
              <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status)); ?>
                 <label>Status</label>
            </div>
        </div>
              
               <div class="row">
            <div class="input-field col s6">
                <label>Timestamp</label>
                <input type="text" readonly="true" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div>
           <div class="row">
            <div class="file-field input-field col s12">
               <?php if($before->image == "") { } else {
                    ?><span class="img-center big"><img src="<?php echo base_url('uploads')."/".$before->image; ?>"></span>
                    <?php } ?>
                <div class="btn blue darken-4">
                    <span>Image</span>
                    <input name="image" type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image',$before->image);?>">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                  <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary jsonsubmit waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url('site/viewgallery'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
            </div>
        </div>
            </div>
        </div>
      
    </form>
</div>

