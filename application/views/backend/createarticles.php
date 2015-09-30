<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Create Article</h4>
    </div>
        <form class="col s12" method="post" action="<?php echo site_url('site/createarticlessubmit');?>" enctype="multipart/form-data">

                <div class="row">
                <div class="input-field col s6">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo set_value('title');?>">
                </div>
            </div>
               <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'status',$status,set_value( 'status'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>
            <div class="row" style="display:none">
                <div class="input-field col s6">
                    <label for="json">Json</label>
    <textarea name="json" class="fieldjsoninput"><?php echo json_encode($fieldjson,true); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12"><textarea name="content" class="materialize-textarea" length="120"><?php echo set_value( 'content');?></textarea>
                    <label>Content</label>
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
            <div class=" form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    <a href="<?php echo site_url('site/viewarticles'); ?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                </div>
            </div>
        </form>
</div>

    <script type="text/javascript">
        $(document).ready(function () {
            filljsoninput(".fieldjsoninput", ".fieldjson");
            $(".jsonsubmit").click(function () {
                jsonsubmit(".fieldjsoninput", ".fieldjson");
            });
        });
    </script>







<!--
<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Create Article</h4>
    </div>
        <form class="col s12" method="post" action="<?php echo site_url('site/createarticlessubmit');?>" enctype="multipart/form-data">

            <div class="row">
                <div class="input-field col s6">
                    <label for="name">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo set_value('title');?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'status',$status,set_value( 'status'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div> 
            <div class="row">
                <div class="input-field col s6">
                    <label for="json">Json</label>
    <textarea name="json" class="fieldjsoninput"><?php echo json_encode($fieldjson,true); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="content" class="materialize-textarea" length="120">
                        <?php echo set_value( 'content');?>
                    </textarea>
                    <label>Content</label>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary jsonsubmit">Save</button>
                    <a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
</div>
 <script type="text/javascript">
        $(document).ready(function () {
            filljsoninput(".fieldjsoninput", ".fieldjson");
            $(".jsonsubmit").click(function () {
                jsonsubmit(".fieldjsoninput", ".fieldjson");
            });
        });
    </script>
    -->
