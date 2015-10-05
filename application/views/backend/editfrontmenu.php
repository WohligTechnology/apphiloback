<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Edit Menu</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editfrontmenusubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

        <div class="row">
            <div class="input-field col m6 s12">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo set_value('name',$before->name);?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col m6 s12">
                <label>Order</label>
                <input type="text" name="order" value="<?php echo set_value('order',$before->order);?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                 <label>Status</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'linktype',$linktype,set_value( 'linktype',$before->linktype), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                 <label>Link Type</label>
            </div>
        </div>
        <!--	Event-->
        <div class="row drop">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'event',$event,set_value( 'event',$before->event), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                 <label>Event</label>
            </div>
        </div>

        <!--	Blog-->
        <div class="row drop">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'blog',$blog,set_value( 'blog',$before->blog), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                 <label>Blog</label>

            </div>
        </div>

        <!--	Gallery-->
        <div class="row drop">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'video',$video,set_value( 'video',$before->video), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                 <label>Video</label>

            </div>
        </div>

        <!--	Video-->
        <div class="row drop">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'gallery',$gallery,set_value( 'gallery',$before->gallery), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                 <label>Gallery</label>

            </div>
        </div>

        <!--	Article-->
        <div class="row drop">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'article',$article,set_value( 'article',$before->article), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                 <label>Article</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <?php echo form_dropdown( 'icon',$icon,set_value( 'icon',$before->icon), 'class="linear-icon form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                 <label>Icon</label>
            </div>
        </div>
        <div class="row" style="display:none">
            <div class="file-field input-field col s12">
                <div class="btn brown">
                    <span>Image</span>
                    <input name="image" type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('image',$before->image);?>">
                    <?php if($before->image == "") { } else { ?>
                        <img src="<?php echo base_url('uploads')." / ".$before->image; ?>" width="140px" height="140px">
                        <?php } ?>
                </div>
            </div>
        </div>

        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary jsonsubmit waves-effect waves-light blue darken-4">Save</button>
                <a href="<?php echo site_url("site/viewfrontmenu"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    //dropdown function
    var $linktype;
    var $sub;
    var $i;
    var $typeid;
    var $event = $('select[name=event]');;
    var $article = $('select[name=article]');;
    var $video = $('select[name=video]');;
    var $gallery = $('select[name=gallery]');;
    var $blog = $('select[name=blog]');;

    function hideshow(id) {
        for ($i = 0; $i < $sub.length; $i++) {
            $sub.eq($i).prop("hidden", true);
        }
        $sub.eq(id).prop("hidden", false);

    }


    $(document).ready(function () {
        //jquery to dropdown


        $event.change(function () {
            $("#typeid").val($event.val());
        });

        $article.change(function () {
            $("#typeid").val($article.val());
        });

        $gallery.change(function () {
            $("#typeid").val($gallery.val());
        });

        $video.change(function () {
            $("#typeid").val($video.val());
        });

        $blog.change(function () {
            $("#typeid").val($blog.val());
        });


        $sub = $(".drop");
        for ($i = 0; $i < $sub.length; $i++) {
            $sub.eq($i).prop("hidden", true);
        }

        //my changes
        $linktype = $('select[name=linktype]');
        $linktype.change(function () {

            switch ($linktype.val()) {
            case "2":
                {
                    hideshow(4);
                    $typeid = $('select[name=article]').val();
                }
                break;
            case "3":
                {
                    hideshow(0);
                    $typeid = $('select[name=event]').val();
                }
                break;
            case "6":
                {
                    hideshow(3);
                    $typeid = $('select[name=gallery]').val();
                }
                break;
            case "8":
                {
                    hideshow(2);
                    $typeid = $('select[name=video]').val();
                }
                break;
            case "10":
                {
                    hideshow(1);
                    $typeid = $('select[name=blog]').val();
                }
                break;
            default:
                {

                }
            }

        });

        
    });
</script>