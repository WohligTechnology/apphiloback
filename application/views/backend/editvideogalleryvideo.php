<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit Videogalleryvideo</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editvideogalleryvideosubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

      
        
           <div class="row">
            <div class="input-field col s6">
                <label for="alt">alt</label>
                <input type="text" id="alt" name="alt" value="<?php echo set_value('alt',$before->alt);?>">
            </div>
        </div> 
             <div class="row">
            <div class="input-field col s6">
                <label for="url">Url</label>
                <input type="text" id="url" name="url" value="<?php echo set_value('url',$before->url);?>">
            </div>
        </div>
   <div class="row">
            <div class="input-field col s6">
                <label for="order">order</label>
                <input type="text" id="order" name="order" value="<?php echo set_value('order',$before->order);?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div> 
            <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'videogallery',$videogallery,set_value( 'videogallery',$before->videogallery), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo site_url("site/viewvideogalleryvideo?id=").$this->input->get('videoid'); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
