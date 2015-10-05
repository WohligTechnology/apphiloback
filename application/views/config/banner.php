<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Config -> Address</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/editconfigsubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

        <div class="row" style="display:none;">
            <div class="input-field col s6">
                <label for="title">Title</label>
                <input title="text" id="title" name="title" value="<?php echo set_value('title',$before->title);?>">
            </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
          <textarea id="textarea1" class="materialize-textarea" value="<?php echo set_value('title',$before->content);?>" name="content"><?php echo set_value('content',$before->content);?></textarea>
          <label for="textarea1">Address</label>
        </div>
  </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="type">Email</label>
                <input type="text" id="type" name="type" value="<?php echo set_value('type',$before->type);?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="text">Phone Number</label>
                <input type="text" id="text" name="text" value="<?php echo set_value('text',$before->text);?>">
            </div>
        </div>
       <div class="row">
            <div class="input-field col s12"><textarea name="description" class="materialize-textarea" length="600"><?php echo set_value( 'description',$before->description);?></textarea>
                <label>Map Embed Link</label>
            </div>
        </div>

        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary green">Save</button>
                <a href="<?php echo site_url("site/viewconfig "); ?>" class="btn btn-secondary red">Cancel</a>
            </div>
        </div>
    </form>
</div>