<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Edit User</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editusersubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

        <div class="row">
            <div class="input-field col s6">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo set_value('name',$before->name);?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <label for="email">Email</label>
                <input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="password" name="password" value="" id="password">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="password" name="confirmpassword" value="" id="confirmpassword">
                <label for="confirmpassword">Confirm Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="socialid">SocialId</label>
                <input type="text" id="socialid" name="socialid" value="<?php echo set_value('socialid',$before->socialid);?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="contact">Contact</label>
                <input type="text" id="contact" name="contact" value="<?php echo set_value('contact',$before->contact);?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <label for="logintype">logintype</label>
                <input type="text" id="logintype" name="logintype" value="<?php echo set_value('logintype',$before->logintype);?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'accesslevel',$accesslevel,set_value( 'accesslevel',$before->accesslevel), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
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
            <div class="input-field col s6">
                <label for="json">Json</label>
                <input type="text" name="json" id="json" value="<?php echo set_value('json',$before->json);?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <textarea name="address" class="materialize-textarea" length="120"><?php echo set_value( 'address',$before->address);?></textarea><label>Address</label>
            </div>
        </div>
         <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'eventnotification',$eventnotification,set_value( 'eventnotification',$before->eventnotification), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
         <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'photonotification',$photonotification,set_value( 'photonotification',$before->photonotification), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
         <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'videonotification',$videonotification,set_value( 'videonotification',$before->videonotification), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
         <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'blognotification',$blognotification,set_value( 'blognotification',$before->blognotification), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                <a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
            </div>
        </div>
    </form>
</div>