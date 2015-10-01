<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Create Videogalleryvideo</h4>
    </div>
    <form class="col s12" method="post" action="<?php echo site_url('site/createvideogalleryvideosubmit');?>" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'videogallery',$videogallery,set_value( 'videogallery'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <label for="alt">Alt</label>
                <input type="text" id="alt" name="alt" value="<?php echo set_value('alt');?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="url">Url</label>
                <input type="text" id="url" name="url" value="<?php echo set_value('url');?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <label for="order">Order</label>
                <input type="text" id="order" name="order" value="<?php echo set_value('order');?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'status',$status,set_value( 'status'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary waves-effect waves-light green">Save</button>
                <a href="<?php echo site_url("site/viewvideogalleryvideo?id=").$this->input->get('id');?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
            </div>
        </div>
    </form>
</div>








<!--
<div id="page-title">
    <a href="<?php echo site_url(" site/viewvideogalleryvideo?id=").$this->input->get('id'); ?>" class="btn btn-primary btn-labeled fa fa-arrow-left margined pull-right">Back</a>
    <h1 class="page-header text-overflow">Videogalleryvideo Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
Create videogalleryvideo </h3>
                </div>
                <div class="panel-body">
                    <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createvideogalleryvideosubmit");?>' enctype='multipart/form-data'>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Order</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ');?>'>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Status</label>
                                <div class="col-sm-4">
                                    <?php echo form_dropdown( "status",$status,set_value( 'status'), "class='chzn-select form-control'");?>
                                </div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Video Gallery</label>
                                <div class="col-sm-4">
                                    <?php echo form_dropdown( "videogallery",$videogallery,set_value( 'videogallery',$this->input->get('id')),"class='chzn-select form-control'");?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Url</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="url" value='<?php echo set_value(' url ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">Alt</label>
                                <div class="col-sm-4">
                                    <input type="text" id="normal-field" class="form-control" name="alt" value='<?php echo set_value(' alt ');?>'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="<?php echo site_url(" site/viewvideogalleryvideo?id=").$this->input->get('id'); ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                    </form>
                    </div>
            </section>
            </div>
        </div>
    </div>-->