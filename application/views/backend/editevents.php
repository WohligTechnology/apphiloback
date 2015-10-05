<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit Events</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editeventssubmit');?>" enctype="multipart/form-data">
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
                 <label>Status</label>
            </div>
        </div>
          
         
            <div class="row">
                 <div class="col s12">
                        <textarea id="some-textarea" name="content" placeholder="Enter text ..."><?php echo set_value( 'content',$before->content);?></textarea>
            <script type="text/javascript">
                $('#some-textarea').wysihtml5();
            </script>
                 </div>
               
            </div>
                <div class="row">
            <div class="input-field col s6">
                <label>Venue</label>
                <input type="text" name="venue" value="<?php echo set_value('venue',$before->venue);?>">
            </div>
        </div>
             <div class="row">
            <div class="file-field input-field col s12">
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
          <div class="row">
                <div class="input-field col s6">
                     <input type="date" class="datepicker" name="startdate" value="<?php echo set_value('startdate',$before->startdate);?>">
                <label >startdate</label>
                </div>  
            </div> 
           <div class="row">
            <div class="input-field col s6">
                <label for="starttime">Starttime</label>
                <input type="text" id="starttime" name="starttime" value="<?php echo set_value('starttime',$before->starttime);?>">
            </div>
        </div>
          <div class="row">
            <div class="input-field col s6">
                <label for="timestamp">Timestamp</label>
                <input type="text" readonly="true" id="timestamp" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div>
<div class="row">
    <div class="col s6">
        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url("site/viewevents"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
            </div>
        </div>
    </div>
</div>
        
    </form>
</div>
<script>  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });</script>
