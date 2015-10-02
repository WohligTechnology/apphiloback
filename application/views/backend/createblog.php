<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Create Blog</h4>
    </div>
        <form class="col s12" method="post" action="<?php echo site_url('site/createblogsubmit');?>" enctype="multipart/form-data">

            <div class="row">
                <div class="input-field col s6">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo set_value('name');?>">
                </div>
            </div> 
                <div class="row">
                <div class="input-field col s6">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo set_value('title');?>">
                </div>
            </div>
            <div class="row" style="display:none">
                <div class="input-field col s6">
                    <label for="json">Json</label>
    <textarea name="json" class="fieldjsoninput"><?php echo json_encode($fieldjson,true); ?></textarea>
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
                    <a href="<?php echo site_url('site/viewblog'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
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
