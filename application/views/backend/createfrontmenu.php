<div class="row">
	<div class="col s12">
		<h4 class="pad-left-15">Create menu</h4>
	</div>
	<form class="col s12" method="post" action="<?php echo site_url('site/createfrontmenusubmit');?>" enctype="multipart/form-data">
		<div class="row">
			<div class="input-field col s6">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" value="<?php echo set_value('name');?>">
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
				<?php echo form_dropdown( 'status',$status,set_value( 'status'), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s6">
				<?php echo form_dropdown('linktype',$linktype,set_value('linktype'), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
			</div>
		</div>

		<!--	Event-->
		<div class="row drop">
			<div class="input-field col s6">
				<?php echo form_dropdown('event',$event,set_value('event'), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
			</div>
		</div>

		<!--	Blog-->
		<div class="row drop">
			<div class="input-field col s6">
				<?php echo form_dropdown('blog',$blog,set_value('blog'), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>

			</div>
		</div>

		<!--	Gallery-->
		<div class="row drop">
			<div class="input-field col s6">
				<?php echo form_dropdown('video',$video,set_value('video'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>

			</div>
		</div>

		<!--	Video-->
		<div class="row drop">
			<div class="input-field col s6">
				<?php echo form_dropdown('gallery',$gallery,set_value('gallery'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>

			</div>
		</div>
		
		<!--	Article-->
		<div class="row drop">
			<div class="input-field col s6">
				<?php echo form_dropdown('article',$article,set_value('article'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>

			</div>
		</div>
		<div class="row" style="display:none">
			<div class="input-field col s6">
				<label for="link">link</label>
				<input type="text" id="link" name="link" value="<?php echo set_value('link');?>">
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s6">
				<label for="typeid">Id selected</label>
				<input type="text" id="typeid" name="typeid" value="<?php echo set_value('typeid');?>">
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
			<div class="input-field col s12">
				<textarea name="json" class="materialize-textarea fieldjsoninput" length="120">
					<?php echo json_encode($fieldjson,true); ?>
				</textarea>
				<label>Json</label>
			</div>
		</div>
		<div class="fieldjson"></div>
		<div class=" form-group">
			<label class="col-sm-2 control-label">&nbsp;</label>
			<div class="col-sm-4">
				<button type="submit" class="btn btn-primary jsonsubmit">Save</button>
				<a href="<?php echo site_url('site/viewfrontmenu'); ?>" class="btn btn-secondary">Cancel</a>
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

	function hideshow(id) {
		for($i=0;$i<$sub.length;$i++){
			$sub.eq($i).prop("hidden", true);
		}
		$sub.eq(id).prop("hidden", false);

	}


	$(document).ready(function () {
		//jquery to dropdown
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
                    console.log("event selected");
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
                    console.log($typeid);
					jsonsubmit(".fieldjsoninput", ".fieldjson");
//					$("form.jsonsubmit").submit();
				});
	});
</script>