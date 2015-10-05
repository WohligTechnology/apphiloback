<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Create Events</h4>
    </div>
        <form class="col s12" method="post" action="<?php echo site_url('site/createeventssubmit');?>" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s6">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo set_value('title');?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'status',$status,set_value( 'status'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                     <label>Status</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn grey darken-1">
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
            <div class="row">
                <div class="input-field col s6">
                    <label for="venue">Venue</label>
                    <input type="text" id="venue" name="venue" value="<?php echo set_value('venue');?>">
                </div>
            </div>
              <div class="row">
                <div class="input-field col s6">
                     <input type="date" class="datepicker" name="startdate" value="<?php echo set_value('startdate');?>">
                <label >startdate</label>
                </div>  
            </div> 
                <div class="row">
                <div class="input-field col s6">
                    <input type="time" id="starttime" name="starttime" value="<?php echo set_value('starttime');?>">
                     <label>starttime</label>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary waves-effect waves-light green">Save</button>
                    <a href="<?php echo site_url('site/viewevents'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
                </div>
            </div>
        </form>
</div>

