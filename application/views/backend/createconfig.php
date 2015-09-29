<div class="row">
    <div class="col s12">
    <h4 class="pad-left-15">Create Config</h4>
    </div>
        <form class="col s12" method="post" action="<?php echo site_url('site/createconfigsubmit');?>" enctype="multipart/form-data">

            <div class="row">
                <div class="input-field col s6">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo set_value('title');?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'type',$type,set_value( 'type'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
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
                 <div class="row">
                <div class="input-field col s12">
                    <textarea name="text" class="materialize-textarea" length="120">
                        <?php echo set_value( 'text');?>
                    </textarea>
                    <label>Text</label>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?php echo site_url('site/viewconfig'); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
</div>








<!--
<div id="page-title">
    <a href="<?php echo site_url(" site/viewconfig "); ?>" class="btn btn-primary btn-labeled fa fa-arrow-left margined pull-right">Back</a>
    <h1 class="page-header text-overflow">Config Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
Create Config </h3>
                </div>
                <div class="panel-body">
                    <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createconfigsubmit");?>' enctype='multipart/form-data'>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Title</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="title" value='<?php echo set_value(' title ');?>'>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Content</label>
                                <div class="col-sm-8">
                                    <textarea name="content" id="" cols="20" rows="10" class="form-control tinymce">
                                        <?php echo set_value( 'content');?>
                                    </textarea>
                                </div>
                            </div>
                            <div class=" form-group" style="display:none">
                                <label class="col-sm-2 control-label" for="normal-field">Text</label>
                                <div class="col-sm-8">
                                    <textarea name="text" id="" cols="20" rows="10" class="form-control tinymce">
                                        <?php echo set_value( 'text');?>
                                    </textarea>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Type</label>
                                <div class="col-sm-4">
                                    <?php echo form_dropdown( "type",$type,set_value( 'type'), "class='chzn-select form-control'");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="<?php echo site_url(" site/viewconfig "); ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                    </form>
                    </div>
            </section>
            </div>
        </div>
    </div>-->