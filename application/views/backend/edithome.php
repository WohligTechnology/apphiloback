<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Home Content</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/edithomesubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
        <div class="row">
            <textarea id="some-textarea" name="content" placeholder="Enter text ...">
                <?php echo set_value( 'content',$before->content);?></textarea>
            <script type="text/javascript">
                $('#some-textarea').wysihtml5();
            </script>
        </div>


        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light green">Save</button>
            <a href="<?php echo site_url(" site/edithome"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
        </div>

    </form>
</div>