<?php /* Smarty version 2.6.19, created on 2015-12-11 17:53:29
         compiled from admin_admin_group_list.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户组管理</title>
<link rel="stylesheet" type="text/css" href="style/main.css" />
<script language="javascript" type="text/javascript" src="js/base.js"></script>
</head>
<body>

<script  type="text/JavaScript">
function on_delete(gid)
{
	if (!confirm("确认删除策略" + name + "(" + gid + ")！"))
	{
		return false;
	}
	
	
    var postData = [];
    postData.push("gid=" + gid); 
		
    SetAjax("admin_group_del_post.php", "post:" + postData.join("&"), function(data){
        eval("var res = " + data);
        if(res.status == 0)
        {
        	alert("删除成功！");
            location.reload();
        }       
        else    
        {       
            alert(res.error);
        }       
    }, true);   
}
</script>

<div width='100%' style='text-align:left'>
	<a href="admin_group_edit.php">添加用户组</a>
</div>
<div class="pages"><?php echo $this->_tpl_vars['g_show']['page_bar']; ?>
</div>

<table style='width:100%'>
  <tr align="center">
    <td width="10%"><b>用户组ID</b></td>
    <td><b>用户组名称</b></td>
    <td><b>状态</b></td>
    <td width="10%"><b>管理</b></td>
  </tr>
<?php echo $this->_tpl_vars['g_show']['list']; ?>
	
</table>
<div class="pages"><?php echo $this->_tpl_vars['g_show']['page_bar']; ?>
</div>
</body>
</html>