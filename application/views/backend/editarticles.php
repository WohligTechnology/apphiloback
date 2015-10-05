<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15"><?php echo $title;?></h4>
    </div>
</div>


</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editarticlessubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
 <?php if($before->id == 1) {?>
    
   <?php }
     else { ?>
     <div class="row">
            <div class="input-field col s6">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo set_value('title',$before->title);?>">
            </div>
        </div>
<?php } ?> 
   
   <?php if($before->id == 1) {?>
    
   <?php }
     else { ?>
    <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                     <label>Status</label>
            </div>
        </div>
<?php } ?>
        <div class="row">
           <div class="col s12">
            <p>Getting Started </p>
            <textarea id="some-textarea" name="content" placeholder="Enter text ..."><?php echo set_value( 'content',$before->content);?></textarea>
            </div>
        </div>
         <?php if($before->id == 1) {?>
    
   <?php }
     else { ?>
   <div class="row">
            <div class="input-field col s6">
                <label>Timestamp</label>
                <input type="text" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div>
<?php } ?>

  <?php if($before->id == 1) {?>
    
   <?php }
     else { ?>
    <div class="row">
            <div class="file-field input-field col s12">
                <div class="btn brown">
                    <span>Image</span>
                    <input name="image" type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image',$before->image);?>">
                    <?php if($before->image == "") { } else { ?>
                    <img src="<?php echo base_url('uploads')." / ".$before->image; ?>" width="140px" height="140px">
                    <?php } ?>
                </div>
            </div>
        </div>
<?php } ?>

<div class="row">
        <div class=" form-group col s6">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary jsonsubmit waves-effect waves-light green">Save</button>
                 <?php if($before->id == 1) {?>
    
   <?php }
     else { ?>
    <a href="<?php echo site_url('site/viewarticles'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
<?php } ?>
<!--                <a href="<?php echo site_url('site/viewarticles'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>-->
            </div>
        </div>
        </div>
    </form>
</div>