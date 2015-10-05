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
            <div class="row">
            <div class="col s12">
                 <label>Content</label>
                  <textarea id="some-textarea" name="content" placeholder="Enter text ..."><?php echo set_value( 'content');?></textarea>
            <script type="text/javascript">
                $('#some-textarea').wysihtml5();
            </script>
            </div>
          
        </div>
             <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn blue darken-4">
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
                    <label for="url">Video Url</label>
                    <input type="text" id="url" name="url" value="<?php echo set_value('url');?>">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                        <div class=" form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
                    <a href="<?php echo site_url('site/viewblog'); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
                </div>
            </div>
                </div>
            </div>
        
        </form>
</div>

