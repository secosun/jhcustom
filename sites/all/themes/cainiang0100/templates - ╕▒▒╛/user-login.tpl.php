
                  <ul>
                    <!--<?php print drupal_render($form['name']);?>-->
                    <!--<?php print drupal_render($form['pass']);?>-->
                    <li>
                      <label class="k" for="a1">帐号：</label>
                      <span class="v">
                      <input type="text" id="edit-name" emel="error_txt" datatype="magic-mobilecode||email" errmsg="帐号格式有误，请重新输入" reqmsg=" 请填写你的登录邮箱或手机" data-placeholder="请输入邮箱/手机" name="name" emptyhintel="emptyhint-10000" value="请输入账号" onfocus="if(this.value=='请输入账号'){this.value='';}" onblur="if(this.value==''){this.value='请输入账号';}">
                      </span> </li>
                    <li>
                      <label class="k" for="a2">密码：</label>
                      <span class="v">
                      <input type="password" emel="error_txt" id="edit-pass" name="pass" data-placeholder="请输入密码" reqmsg="请填写密码" emptyhintel="emptyhint-10001">
                      </span> </li>
                  </ul>
                  <div class="error-txt"><em id="error_txt"></em></div>
                  <div class="login-remember cls">
                    <div class="remember-checkbox">
                      <input type="checkbox" name="auto_flag" id="auto_flag1" checked="true">
                      <label for="auto_flag1" title="建议在网吧或公共电脑上取消该选项">下次自动登录</label>
                    </div>
                    <a class="fogot-num" href="password" target="_blank" tabindex="-1">忘记密码?</a>
				  </div>
                  <div class="btns">
                     <?php print drupal_render_children($form);?>
                
                  </div>
                