<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Create User</h4>
    </div>
        <form class="col s12" method="post" action="<?php echo site_url('site/createusersubmit');?>" enctype="multipart/form-data">

            <div class="row">
                <div class="input-field col s6">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo set_value('name');?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" value="<?php echo set_value('email');?>">
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
                    <input type="text" id="socialid" name="socialid" value="<?php echo set_value('socialid');?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <label for="contact">Contact</label>
                    <input type="text" id="contact" name="contact" value="<?php echo set_value('contact');?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <label for="logintype">logintype</label>
                    <input type="text" id="logintype" name="logintype" value="<?php echo set_value('logintype');?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'status',$status,set_value( 'status'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Image</span>
                        <input name="image" type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image');?>">
                    </div>
                </div>
            </div> 
                <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Cover Image</span>
                        <input name="coverimage" type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('coverimage');?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'accesslevel',$accesslevel,set_value( 'accesslevel'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <label for="json">Json</label>
                    <input type="text" name="json" id="json" value="<?php echo set_value('json');?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12"><textarea name="address" class="materialize-textarea" length="120"><?php echo set_value( 'address');?></textarea>
                    <label>Address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'eventnotification',$eventnotification,set_value( 'eventnotification'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'photonotification',$photonotification,set_value( 'photonotification'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'videonotification',$videonotification,set_value( 'videonotification'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'blognotification',$blognotification,set_value( 'blognotification'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
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