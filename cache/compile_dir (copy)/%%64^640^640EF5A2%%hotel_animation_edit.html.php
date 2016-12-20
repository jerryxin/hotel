<?php /* Smarty version 2.6.19, created on 2016-08-23 10:02:00
         compiled from hotel/hotel_animation_edit.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery/jquery.js" charset="utf-8"></script>
<script language="javascript" type="text/javascript" src="/js/hotel/uploader.js"></script>
<script language="javascript" type="text/javascript" src="/js/hotel/tips.js"></script>
<script type="text/javascript" src="/admin/js/jquery.form.js" charset="utf-8"></script>

</head>
<body>
<div class="main">
	<div class="title-sp">
		<h2>添加动画</h2>
		<span class="l"></span>
		<span class="r"></span>
	</div>
	<div class="table-box">
		<div class="table-top">
			<a href="hotel_animation_list.php" class="button button_a">返回列表</a>
		</div>
		<div class="table-data-box">
			<form id="form1" method="post" enctype="multipart/form-data" action="hotel_animation_edit_post.php">
				<input type="hidden" value="<?php echo $this->_tpl_vars['g_show']['item']['id']; ?>
" name="id" id="id" />
				<table class="table-add-modify">
					
					<tr>
						<td>开机动画<span class="require">*</span></td>
						<td><input type="text" class="text" readonly="readonly" name="url" id="url" value="<?php echo $this->_tpl_vars['g_show']['item']['url']; ?>
" /><span class="uploadfile app_link_class"><input type="button" value="浏览" /> </span> &nbsp;
							<div class="f_c">请上传zip文件</div>
						</td>
					</tr>
              
					<tr>
						<td></td>
						<td><input type="submit" value="提交" class="button form_submit" /> &nbsp; &nbsp; <input type="reset" value="重置" onclick="reset()" class="button" /></td>
					</tr>
            </table>
			</form>
		</div>
    
		<span class="l"></span>
		<span class="r"></span>
	</div>
</div>
</body>

<script type="text/javascript">

$(function(){
	
	options={
		callback:'/js/uploader_callback.html',
		container:'.app_link_class',
		script:'/interface/common/json_file_upload.php',
		onComplete:function(res){
			if(res.error ==0)
			{
			
				if(res.link)
				{
					$("#url").val(res.link);

					return ;
				}
				
			}
			else
			{
				alert(res.errormsg);
			}
				
		},
		errorId:'#errormsg'
	};

	TV.ImgUploader.init(options);

});


</script>

<script>

$("#department").find("option[value='<?php echo $this->_tpl_vars['g_show']['item']['department_id']; ?>
']").attr("selected",true);

$(".form_submit").bind("click", function () {

	
	if(!$("#url").val())
	{
		alert("开机动画不能为空！");
		return false;
	}
	
	$("#my_form").submit();

} );

</script>

</html>