<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Create Notification</h4>
    </div>
        <form class="col s12" method="post" action="<?php echo site_url('site/createnotificationsubmit');?>" enctype="multipart/form-data">

           
            <div class="row">
                <div class="input-field col s6">
                    <label for="link">link</label>
                    <input type="text" id="link" name="link" value="<?php echo set_value('link');?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'status',$status,set_value( 'status'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div> 
                <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'videogallery',$videogallery,set_value( 'videogallery'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div> 
<!--
                <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'videogalleryvideo',$videogalleryvideo,set_value( 'videogalleryvideo'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div> 
                <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'galleryimage',$galleryimage,set_value( 'galleryimage'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div> 
-->
                <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'event',$event,set_value( 'event'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div> 
                <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'article',$article,set_value( 'article'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn brown">
                        <span>Image</span>
                        <input name="image" type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image');?>">
                    </div>
                </div>
            </div>
             <div class="row">
            <textarea id="some-textarea" name="content" placeholder="Enter text ..."><?php echo set_value( 'content');?></textarea>
            <script type="text/javascript">
                $('#some-textarea').wysihtml5();
            </script>
        </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary waves-effect waves-light green">Save</button>
                    <a href="<?php echo site_url('site/viewnotification'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
                </div>
            </div>
        </form>
</div>







<!--
<div id="page-title">
<a href="<?php echo site_url("site/viewnotification"); ?>" class="btn btn-primary btn-labeled fa fa-arrow-left margined pull-right">Back</a>
<h1 class="page-header text-overflow">Notification Details </h1>
</div>
<div id="page-content">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<div class="panel-heading">
<h3 class="panel-title">
Create Notification </h3>
</div>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createnotificationsubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Video Gallery</label>
<div class="col-sm-4">
<?php echo form_dropdown("videogallery",$videogallery,set_value('videogallery'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">event</label>
<div class="col-sm-4">
<?php echo form_dropdown("event",$event,set_value('event'),"class='chzn-select form-control'");?>
</div>
</div>
-->
<!--
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Video Gallery Video</label>
<div class="col-sm-4">
<?php echo form_dropdown("videogalleryvideo",$videogalleryvideo,set_value('videogalleryvideo'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Gallery Image</label>
<div class="col-sm-4">
<?php echo form_dropdown("galleryimage",$galleryimage,set_value('galleryimage'),"class='chzn-select form-control'");?>
</div>
</div>
-->
<!--
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">article</label>
<div class="col-sm-4">
<?php echo form_dropdown("article",$article,set_value('article'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Status</label>
<div class="col-sm-4">
<?php echo form_dropdown("status",$status,set_value('status'),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Link</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="link" value='<?php echo set_value('link');?>'>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Image</label>
<div class="col-sm-4">
<input type="file" id="normal-field" class="form-control" name="image" value='<?php echo set_value('image');?>'>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Content</label>
<div class="col-sm-8">
<textarea name="content" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'content');?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href="<?php echo site_url("site/viewnotification"); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
</div>
-->
