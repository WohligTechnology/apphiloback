<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit Slider</h4>
    </div>
</div>
<div class="row">
    <form class="" method="post" action="<?php echo site_url('site/editslidersubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

   <div class="row">
            <div class="input-field col m6 s12">
                <label for="order">order</label>
                <input type="text" id="order" name="order" value="<?php echo set_value('order',$before->order);?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                 <label>Status</label>
            </div>
        </div>

        <div class="row">
            <div class="file-field input-field col m6 s12">
                <div class="btn blue darken-4">
                    <span>Image</span>
                    <input name="image" type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image',$before->image);?>">
                    <?php if($before->image == "") { } else {
                    ?><img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url("site/viewslider"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
            </div>
        </div>
    </form>
</div>

