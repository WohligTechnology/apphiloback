<div class="row">
    <div class="col s8 offset-s2">
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
            <!--
                <div class=" input-field col s6">
                    <label class="col-sm-2 control-label" for="normal-field">SocialId</label>
                    <div class="col-sm-4">
                        <input type="text" id="normal-field" class="form-control" name="socialid" value="<?php echo set_value('socialid');?>">
                    </div>
                </div>
-->
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
                    <label>Select: </label>
                    <?php echo form_dropdown( 'status',$status,set_value( 'status'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>

            <!--
                        <div class=" input-field col s6">
                            <label class="col-sm-2 control-label" for="normal-field">Image</label>
                            <div class="col-sm-4">

                                <span class="pull-left btn btn-default btn-file">
											Browse... <input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
											</span>
                            </div>
                        </div>
-->

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
                <div class="input-field col s6">
                    <label>Select Accesslevel </label>
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
                <div class="input-field col s12">
                    <textarea name="address" class="materialize-textarea" length="120">
                        <?php echo set_value( 'address');?>
                    </textarea>
                    <label>Address</label>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>