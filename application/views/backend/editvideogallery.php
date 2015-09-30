
<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit Videogallery</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editvideogallerysubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
         <div class="row">
            <div class="input-field col s6">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo set_value('name',$before->name);?>">
            </div>
        </div>
         <div class="row">
            <div class="input-field col s6">
                <label for="subtitle">Subtitle</label>
                <input type="text" id="subtitle" name="subtitle" value="<?php echo set_value('subtitle',$before->subtitle);?>">
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
        
              <div class="row" style="display:none">
                <div class="input-field col s6">
                    <label for="json">Json</label>
    <textarea name="json" class="fieldjsoninput"><?php echo set_value( 'json',$before->json);?></textarea>
                </div>
            </div>
            <div class="fieldjson"></div>
               <div class="row">
            <div class="input-field col s6">
                <label>Timestamp</label>
                <input type="text" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div>

        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary jsonsubmit waves-effect waves-light">Save</button>
                <a href="<?php echo site_url('site/viewvideogallery'); ?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
            </div>
        </div>
    </form>
</div>
   
   <script type="text/javascript">
    $(document).ready(function () {
        //        console.log($(".fieldjsoninput").val());
        filljsoninput(".fieldjsoninput", ".fieldjson");
        $(".jsonsubmit").click(function () {
            jsonsubmit(".fieldjsoninput", ".fieldjson");
            //return false;
        });
    });
</script>