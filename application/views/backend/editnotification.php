<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit Notification</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editnotificationsubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

      
        
           <div class="row">
            <div class="input-field col s6">
                <label for="link">link</label>
                <input type="text" id="link" name="link" value="<?php echo set_value('link',$before->link);?>">
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
             <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'event',$event,set_value( 'event',$before->event), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>  
             <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'article',$article,set_value( 'article',$before->article), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>

        <div class="row">
            <div class="file-field input-field col s12">
                <div class="btn">
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
         <div class="row">
                <div class="input-field col s12">
                    <textarea name="content" class="materialize-textarea" length="120">
                        <?php echo set_value( 'content',$before->content);?>
                    </textarea>
                    <label>Content</label>
                </div>
            </div>
               <div class="row">
            <div class="input-field col s6">
                <label for="timestamp">Timestamp</label>
                <input type="text" id="timestamp" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div>
        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo site_url("site/viewnotification"); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>






<!--
<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Notification Details </h3>
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editnotificationsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Video Gallery</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "videogallery",$videogallery,set_value( 'videogallery',$before->videogallery),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">event</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "event",$event,set_value( 'event',$before->event),"class='chzn-select form-control'");?>
                </div>
            </div>

            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">article</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "article",$article,set_value( 'article',$before->article),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Status</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "status",$status,set_value( 'status',$before->status),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Link</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="link" value='<?php echo set_value(' link ',$before->link);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Image</label>
                <div class="col-sm-4">
                    <input type="file" id="normal-field" class="form-control" name="image" value='<?php echo set_value(' image ',$before->image);?>'>
                    <?php if($before->image == "") { } else { ?>
                    <img src="<?php echo base_url('uploads')." / ".$before->image; ?>" width="140px" height="140px">
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Timestamp</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="timestamp" value='<?php echo set_value(' timestamp ',$before->timestamp);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Content</label>
                <div class="col-sm-8">
                    <textarea name="content" id="" cols="20" rows="10" class="form-control tinymce">
                        <?php echo set_value( 'content',$before->content);?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewnotification"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>-->