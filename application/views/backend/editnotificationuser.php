<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit Notificationuser</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editnotificationusersubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">


        <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'notification',$notification,set_value( 'notification',$before->notification), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
            <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'user',$user,set_value( 'user',$before->user), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>  

               <div class="row">
            <div class="input-field col s6">
                <label for="timestamp">Timestamp</label>
                <input type="text" id="timestamp" name="timestamp" value="<?php echo set_value('timestamp',$before->timestamp);?>">
            </div>
        </div> 
             <div class="row">
            <div class="input-field col s6">
                <label for="timestamp_receive">Timestamp received</label>
                <input type="text" id="timestamp_receive" name="timestamp_receive" value="<?php echo set_value('timestamp_receive',$before->timestamp_receive);?>">
            </div>
        </div>
        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo site_url("site/viewnotificationuser?id=").$this->input->get('notificationid'); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>








<!--
<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Notificationuser Details </h3>
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editnotificationusersubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Notification</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "notification",$notification,set_value( 'notification',$before->notification),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">User</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "user",$user,set_value( 'user',$before->user),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Timestamp</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="timestamp" value='<?php echo set_value(' timestamp ',$before->timestamp);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Timestamp Received</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="timestamp_receive" value='<?php echo set_value(' timestamp_receive ',$before->timestamp_receive);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewnotificationuser?id=").$this->input->get(' notificationid '); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>-->