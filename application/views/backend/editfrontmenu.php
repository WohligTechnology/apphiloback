<div class="row">
    <div class="col s12">
        <h4 class="pad-left-15">Edit Frontmenu</h4>
    </div>
</div>
<div class="row">
    <form class="col s12" method="post" action="<?php echo site_url('site/editfrontmenusubmit');?>" enctype="multipart/form-data">
        <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

        <div class="row">
            <div class="input-field col s6">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo set_value('name',$before->name);?>">
            </div>
        </div>

        <!--
           <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'parent',$parent,set_value( 'parent',$before->parent), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div> 
-->
        <div class="row">
            <div class="input-field col s6">
                <label>Order</label>
                <input type="text" name="order" value="<?php echo set_value('order',$before->order);?>">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
       

        <div class="row" style="display:none">
            <div class="input-field col s6">
                <label>Link</label>
                <input type="text" name="link" value="<?php echo set_value('link',$before->link);?>">
            </div>
        </div>
           <div class="row">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'linktype',$linktype,set_value( 'linktype',$before->linktype), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>
        <!--	Event-->
        <div class="row drop">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'event',$event,set_value( 'event',$before->event), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
            </div>
        </div>

        <!--	Blog-->
        <div class="row drop">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'blog',$blog,set_value( 'blog',$before->blog), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>

            </div>
        </div>

        <!--	Gallery-->
        <div class="row drop">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'video',$video,set_value( 'video',$before->video), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>

            </div>
        </div>

        <!--	Video-->
        <div class="row drop">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'gallery',$gallery,set_value( 'gallery',$before->gallery), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>

            </div>
        </div>

        <!--	Article-->
        <div class="row drop">
            <div class="input-field col s6">
                <?php echo form_dropdown( 'article',$article,set_value( 'article',$before->article), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>

            </div>
        </div>
     <div class="row">
			<div class="input-field col s6">
				<?php echo form_dropdown( 'link',$link,set_value( 'link',$before->link), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
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
        <div class="row" style="display:none">
            <div class="input-field col s6">
                <label for="json">Json</label>
                <textarea name="json" class="fieldjsoninput">
                    <?php echo set_value( 'json',$before->json);?></textarea>
            </div>
        </div>
        <div class="fieldjson"></div>
        <div class=" form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary jsonsubmit waves-effect waves-light green">Save</button>
                <a href="<?php echo site_url("site/viewfrontmenu "); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
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



        //avi code
        //		var $linktype = $("select.linktype");
        //		var $test = $("select.test");
        //		var $question = $("select.question");
        //		var $option = $("select.option");
        //		var $pillar = $("select.pillar");
        //		var new_base_url = "<?php echo site_url(); ?>";
        //
        //		$test.change(function () {
        //			$.getJSON(new_base_url + '/site/getquestionbytest', {
        //				test: $test.val(),
        //				pillar: $pillar.val()
        //			}, function (data) {
        //				populate(data, $question);
        //			});
        //		});
        //
        //		$question.change(function () {
        //			$.getJSON(new_base_url + '/site/getoptionbyquestion', {
        //				question: $question.val()
        //			}, function (data) {
        //				populate(data, $option);
        //			});
        //		});
        //
        //
        //Jquery to fill json
        filljsoninput(".fieldjsoninput", ".fieldjson");
        $(".jsonsubmit").click(function () {
            $("#typeid").val($typeid);
            jsonsubmit(".fieldjsoninput", ".fieldjson");
            //					$("form.jsonsubmit").submit();
        });
    });
</script>