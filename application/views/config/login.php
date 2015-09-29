<div class="row offset-s3">
    <div class="col s12">
        <h4 class="pad-left-15">Login Config</h4>
    </div>

    <div class="col s4">
        <div class="logintype normalLogin">
            <div class="row">
                <div class="col s6">
                    <label for="filled-in-box" class="form-checkbox">Email and Password Login</label>
                </div>
                <div class="col s6">
                    <div class="switch">
                        <label>
                            Off
                            <input type="checkbox">
                            <span class="lever"></span> On
                        </label>

                    </div>
                </div>
            </div>


        </div>
        <div class="logintype googleLogin">
          
            <div class="row">
                <div class="col s6">
                    <label for="filled-in-box" class="form-checkbox">Google Login</label>
                </div>
                <div class="col s6">
                    <div class="switch">
                        <label>
                            Off
                            <input type="checkbox"  name="Google">
                            <span class="lever"></span> On
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="sublogintype" style=" min-height: 110px;">
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="appid">Google Appid</label>
                            <input type="text" id="appid" name="appid">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="secretid">Google Secret Id</label>
                            <input type="text" id="secretid" name="secret">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="logintype facebookLogin">
            <div class="row">
                <div class="col s6">
                    <label for="filled-in-box" class="form-checkbox">Facebook Login</label>
                </div>
                <div class="col s6">
                    <div class="switch">
                        <label>
                            Off
                            <input type="checkbox"  name="Facebook">
                            <span class="lever"></span> On
                        </label>
                    </div>
                </div>
            </div>
            <div class="sublogintype" style=" min-height: 110px;">
                <div class="row">
                    <div class="input-field col s12">
                        <label for="fbappid">Facebook Appid</label>
                        <input type="text" id="fbappid" name="appid">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="fbsecretid">Facebook Secret Id</label>
                        <input type="text" id="fbsecretid" name="secret">
                    </div>
                </div>
            </div>

        </div>
        <div class="logintype twitterLogin">
            <div class="row">
                <div class="col s6">
                    <label for="filled-in-box" class="form-checkbox">Twitter Login</label>
                </div>
                <div class="col s6">
                    <div class="switch">
                        <label>
                            Off
                            <input type="checkbox"  name="twitter">
                            <span class="lever"></span> On
                        </label>
                    </div>
                </div>
            </div>
            <div class="sublogintype" style=" min-height: 110px;">
                <div class="row">
                    <div class="input-field col s12">
                        <label for="tappid">Twitter Appid</label>
                        <input type="text" id="tappid" name="appid">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="tsecretid">Twitter Secret Id</label>
                        <input type="text" id="tsecretid" name="secret">
                    </div>
                </div>
            </div>

        </div>
        <div class="logintype instagramLogin">
           <div class="row">
                <div class="col s6">
                    <label for="filled-in-box" class="form-checkbox">Instagram Login</label>
                </div>
                <div class="col s6">
                    <div class="switch">
                        <label>
                            Off
                            <input type="checkbox"  name="instagram">
                            <span class="lever"></span> On
                        </label>
                    </div>
                </div>
            </div>
            <div class="sublogintype" style=" min-height: 110px;">
                <div class="row">
                    <div class="input-field col s12">
                        <label for="iappid">Instagram Appid</label>
                        <input type="text" id="iappid" name="appid">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="isecretid">Instagram Secret Id</label>
                        <input type="text" id="isecretid" name="secret">
                    </div>
                </div>
            </div>
        </div>
        <form class="col s12" method="post" action="<?php echo site_url('site/editconfigsubmit');?>" enctype="multipart/form-data">
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

            <div class="row" style="display:none">
                <div class="input-field col s6">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo set_value('title',$before->title);?>">
                </div>
            </div>
            <div class="row" style="display:none">
                <div class="input-field col s12">
                    <textarea name="content" class="materialize-textarea" length="120">
                        <?php echo set_value( 'content',$before->content);?>
                    </textarea>
                    <label>Content</label>
                </div>
            </div>
            <div class="row" style="display:none">
                <div class="input-field col s12">
                    <textarea name="text" class="materialize-textarea" id="textid" length="120">
                        <?php echo set_value( 'text',$before->text);?>
                    </textarea>
                    <label>Text</label>
                </div>
            </div>

            <div class="row" style="display:none">
                <div class="input-field col s6">
                    <?php echo form_dropdown( 'type',$type,set_value( 'type',$before->type), 'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <div class="submitlogin">
                        <button class="btn cyan waves-effect waves-light right loginsubmit" type="submit" name="action">Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        var $demo=0;
        var $logint = {};
        $(document).ready(function () {

            var $logintype = $(".logintype");
            console.log(JSON.parse($("#textid").val()).length);
            var alldata = JSON.parse($("#textid").val());
            for (var i = 0; i < JSON.parse($("#textid").val()).length; i++) {
                var $checkbox = $logintype.eq(i).find(".checkbox").find("input[type=checkbox]");
                var $inputs = $logintype.eq(i).find(".sublogintype").find("input");

                $inputs.eq(0).val(alldata[i].appid);
                $inputs.eq(1).val(alldata[i].secret);

                if (alldata[i].value == true) {
                    $checkbox.prop("checked", true);
                }

            }

            $(".logintype input[type=checkbox]").click(function () {
                var shouldshow = $(this).prop("checked");
                $demo=$(this);
                console.log(shouldshow);
                var $sublogin = $(this).parents(".logintype").find(".sublogintype");
                
                console.log($sublogin);
                if (shouldshow) {
                    $sublogin.show(200);
                } else {
                    $sublogin.hide(200);
                }
            });

            $("button.loginsubmit").click(function () {
                var sendjson = [];
                var $logintype = $(".logintype");
                $logint = $logintype;
                for (var i = 0; i < $logintype.length; i++) {
                    var obj = {};
                    var $checkbox = $logintype.eq(i).children(".checkbox").find("input[type=checkbox]");
                    var $inputs = $logintype.eq(i).children(".sublogintype").find("input");
                    obj.name = $checkbox.attr("name");
                    obj.value = $checkbox.prop("checked");
                    for (var j = 0; j < $inputs.length; j++) {
                        obj[$inputs.eq(j).attr("name")] = $inputs.eq(j).val();
                    }
                    sendjson.push(obj);
                }
                console.log(sendjson);

                $(".logindata").val(JSON.stringify(sendjson));
                $("form.loginform").submit();
            });

        });
    </script>