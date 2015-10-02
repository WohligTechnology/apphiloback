<div class="row">

    <?php if($before->id == 1) {?>
    <div class="col s12">
        <h4 class="pad-left-15">Edit Home</h4>
    </div>
   <?php }
     else { ?>
    <div class="col s12">
    <h4 class="pad-left-15">Edit Articles</h4>
</div>
<?php } ?>


</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editarticlessubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

        <div class="row">
            <div class="input-field col s6">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo set_value('title',$before->title);?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
        <div class="row">
            <textarea id="some-textarea" name="content" placeholder="Enter text ...">
                <?php echo set_value( 'content',$before->content);?></textarea>
            <script type="text/javascript">
                $('#some-textarea').wysihtml5();
            </script>
        </div>
        <div class="row" style="display:none">
            <div class="input-field col s6">
                <label for="json">Json</label>
                <textarea name="json" class="fieldjsoninput">
                    <?php echo set_value( 'json',$before->json);?></textarea>
            </div>
        </div>
        <div class="fieldjson"></div>
        <div class="row">
            <div class="input-field col s6">
                <label>Timestamp</label>
                <input type="text" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div>
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

        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary jsonsubmit waves-effect waves-light green">Save</button>
                <a href="<?php echo site_url('site/viewarticles'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
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








<!--
<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit Articles</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editarticlessubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

        <div class="row">
            <div class="input-field col s6">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo set_value('title',$before->title);?>">
            </div>
        </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div> 
              <div class="row">
                <div class="input-field col s12">
                    <textarea name="content" class="materialize-textarea" length="120"><?php echo set_value( 'content',$before->content);?>
                    </textarea>
                    <label>Content</label>
                </div>
            </div>
              <div class="row">
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
                <button type="submit" class="btn btn-primary jsonsubmit">Save</button>
                <a href="<?php echo site_url('site/viewarticles'); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
 
<script type="text/javascript">
    
    $(document).ready(function () {
        filljsoninput(".fieldjsoninput",".fieldjson");
        $(".jsonsubmit").click(function() {
            jsonsubmit(".fieldjsoninput",".fieldjson");
        });
        
    });
</script>

-->