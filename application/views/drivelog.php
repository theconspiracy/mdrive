
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="generator" content="Adobe GoLive" />
		<title>Moondog Edit | Drive Log</title>
		<meta name="description" content="The Drive Log of Moondog Edit. For Internal Eyes Only." />
		<link href="css/agl-styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/basic.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.js"></script>
		<script src="js/drivelog.js"></script>
		<style type="text/css" media="all"><!--
body { background-color: #fff; background-image: url(media/background.jpg); margin: 20px 0; }
.dsR10 /*agl rulekind: base;*/ { width: 617px; height: auto; }
.dsR20 /*agl rulekind: base;*/ { width: 100px; vertical-align: top; }
.dsR28 /*agl rulekind: base;*/ { width: auto; vertical-align: top; }
.dsR54 /*agl rulekind: base;*/ { width: auto; height: auto; }
.dsR75 /*agl rulekind: base;*/ { width: 326px; height: 46px; }
.dsR77 /*agl rulekind: base;*/ { width: 60px; height: auto; }
.dsR82 /*agl rulekind: base;*/ { background-image: url(media/whitetransparent.png); width: auto; height: 30px; }
.dsR85 /*agl rulekind: base;*/ { width: 132px; height: auto; }
.dsR95 /*agl rulekind: base;*/ { width: 90px; }
.dsR109 /*agl rulekind: base;*/ { width: auto; }
.dsR118 /*agl rulekind: base;*/ { width: 330px; }
.dsR121 /*agl rulekind: base;*/ { width: 130px; vertical-align: top; }
.dsR122 /*agl rulekind: base;*/ { width: 156px; height: auto; }
.dsR139 /*agl rulekind: base;*/ { width: auto; height: 120px; vertical-align: middle; }
.dsR142 /*agl rulekind: base;*/ { background-image: url(media/whitetransparent.png); width: auto; height: 30px; vertical-align: middle; }
.dsR145 /*agl rulekind: base;*/ { width: auto; height: 140px; vertical-align: middle; }
.dsR147 /*agl rulekind: base;*/ { width: auto; height: 60px; vertical-align: middle; }
.dsR148 /*agl rulekind: base;*/ { width: auto; height: 10px; vertical-align: middle; }
#panel{position:absolute;width:100%;min-height:100%;left:-4000px;top:0px;background-color:#000000;z-index:4000;opacity:.8;overflow:auto}
--></style>
	</head>

	<body>
		<div id="panel"><div align="center" style="color:#ffffff;padding-top:100px"><img src="media/ajax-loader.gif"/><br/>Loading...</div></div>
		<div align="center">
			<table class="dsR54" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="dsR82">
						<div align="center">
							<h1 class="parHeading1">MOONDOG DRIVE LOG</h1>
						</div>
					</td>
				</tr>
				<tr>
					<td class="dsR139">
						<div align="center">
							<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
								<tr>
									<td class="dsR118">
										<form id="brand_form" method="POST">
										<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
											<tr>
												<td class="dsR95">Brand Add:</td>
												<td class="dsR109"><input class="dsR85" type="text" name="name" size="20" id="name" /></td>
												<td class="dsR109"><input type="button" name="add" value="Add"  onClick="javascript:$.api('brand_form','addBrand');" /></td>
											</tr>
										</table>
										</form>
										<form id="brand_delete_form" method="POST">
										<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
											<tr>
												<td class="dsR95">Brand Delete:</td>
												<td class="dsR109">
													<div class="brands">
														<select name="brand_id" size="1">
													<?php foreach($brands as $key =>$value): ?>
														<option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
													<?php endforeach; ?>
													</select>
													</div>
												</td>
												<td class="dsR109"><input type="button" name="delete" value="Delete" onClick="javascript:$.api('brand_delete_form','deleteBrand',{confirmAction:true});" /></td>
											</tr>
										</table>
										</form>
									</td>
									<td class="dsR118">
										<form id="capacity_form" method="POST">
										<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
											<tr>
												<td class="dsR95">Capacity Add:</td>
												<td class="dsR109"><input class="dsR85" type="text" name="amount" size="20" /></td>
												<td class="dsR109"><input type="button" name="add" value="Add"  onClick="javascript:$.api('capacity_form','addCapacity');" /></td>
											</tr>
										</table>
										</form>
										<form id="capacity_delete_form" method="POST">
										<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
											<tr>
												<td class="dsR95">Capacity Delete: </td>
												<td class="dsR109">
													<div class="capacity">
													<select class="dsR54" name="capacity_id" size="1">
														<?php foreach($capacity as $key =>$value): ?>
															<option value="<?php echo $value->id;?>"><?php echo $value->amount;?></option>
														<?php endforeach; ?>
													</select>
													</div>
													</td>
												<td class="dsR109"><input type="button" name="delete" value="Delete"  onClick="javascript:$.api('capacity_delete_form','deleteCapacity',{cofirmAction:true}));"/></td>
											</tr>
										</table>
										</form>
									</td>
									<td class="dsR118">
										<form id="user_form" method="POST">
										<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
											<tr>
												<td class="dsR95">User Add:</td>
												<td class="dsR109"><input class="dsR85" type="text" name="name" size="20" /></td>
												<td class="dsR109"><input type="button" name="add" value="Add"  onClick="javascript:$.api('user_form','addUser');" /></td>
											</tr>
										</table>
										</form>
										<form id="user_delete_form" method="POST">
										<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
											<tr>
												<td class="dsR95">User Delete:</td>
												<td class="dsR109" id="users">
													<div class="users">
													<select name="user_id" size="1">
														<?php foreach($users as $key =>$value): ?>
															<option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
														<?php endforeach; ?>
													</select>
													</div>
													</td>
												<td class="dsR109"><input type="button" name="delete" value="Delete" onClick="javascript:$.api('user_delete_form','deleteUser',{cofirmAction:true}));"/></td>
											</tr>
										</table>
										</form>
									</td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
				<tr>
					<td class="dsR148">
						<hr />
					</td>
				</tr>
				<tr>
					<td class="dsR142">
						<div align="center">
							<h1 class="parHeading1">DRIVE ADD</h1>
						</div>
					</td>
				</tr>
				<tr>
					<td class="dsR145">
						<form id="drive_form" method="POST">
						<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
							<tr>
								<td class="dsR28">Name</td>
								<td class="dsR28">Contents</td>
								<td class="dsR121">Jobs</td>
								<td class="dsR20">Brand</td>
								<td class="dsR28">Capacity</td>
								<td class="dsR28">Free Space</td>
								<td class="dsR28">User</td>
								<td class="dsR28">Free</td>
								<td class="dsR28">Add</td>
								<td class="dsR28"></td>
							</tr>
							<tr>
								<td class="dsR28">
									<hr />
								</td>
								<td class="dsR28">
									<hr />
								</td>
								<td class="dsR121">
									<hr />
								</td>
								<td class="dsR20">
									<hr />
								</td>
								<td class="dsR28">
									<hr />
								</td>
								<td class="dsR28">
									<hr />
								</td>
								<td class="dsR28">
									<hr />
								</td>
								<td class="dsR28">
									<hr />
								</td>
								<td class="dsR28">
									<hr />
								</td>
								<td class="dsR28">
									
								</td>
							</tr>
							<tr>
								<td class="dsR28"><input class="dsR77" type="text" name="name" value="" size="8" maxlength="5" /></td>
								<td class="dsR28"><textarea class="dsR75" name="contents" rows="2" cols="50"></textarea></td>
								<td class="dsR121"><input class="dsR122" type="text" name="jobs" size="24" /></td>
								<td class="dsR20">
									<div class="brands">
									<select name="brand_id" size="1">
										<?php foreach($brands as $key =>$value): ?>
											<option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
										<?php endforeach; ?>
									</select>
									</div>
								</td>
								<td class="dsR28">
									<div class="capacity">
									<select class="dsR54" name="capacity_id" size="1">
										<?php foreach($capacity as $key =>$value): ?>
											<option value="<?php echo $value->id;?>"><?php echo $value->amount;?></option>
										<?php endforeach; ?>
									</select>
									</div>
									</td>
								<td class="dsR28"><input class="dsR77" type="text" name="free_space" value="" size="8" maxlength="8" /></td>
								<td class="dsR28">
									<div class="users">
									<select name="user_id" size="1">
										<?php foreach($users as $key =>$value): ?>
											<option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
										<?php endforeach; ?>
									</select>
									</div>
									</td>
								<td class="dsR28"><select name="free" size="1">
										<option value="1">Yes</option>
										<option selected="selected" value="0">No</option>
									</select></td>
								<td class="dsR28"><input type="button" name="add" value="Add" onClick="javascript:$.api('drive_form','addDrive');"/></td>
								<td class="dsR28"></td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
				<tr>
					<td class="dsR148">
						<hr />
					</td>
				</tr>
				<tr>
					<td class="dsR142">
						<div align="center">
							<h1 class="parHeading1">DRIVE SEARCH</h1>
						</div>
					</td>
				</tr>
				<tr>
					<td class="dsR147">
						<div align="center"> <input class="dsR10" type="text" name="searchTextField" size="100" /> <input type="submit" name="submitButtonName" value="Search" /></div>
					</td>
				</tr>
				<tr>
					<td class="dsR28">
						<div align="center">
							<table class="dsR54" border="0" cellspacing="2" cellpadding="0">
								<tr>
									<td class="dsR28">Name</td>
									<td class="dsR28">Contents</td>
									<td class="dsR121">Jobs</td>
									<td class="dsR20">Brand</td>
									<td class="dsR28">Capacity</td>
									<td class="dsR28">Free Space</td>
									<td class="dsR28">User</td>
									<td class="dsR28">Free</td>
									<td class="dsR28">Update</td>
									<td class="dsR28">Delete</td>
								</tr>
								<tr>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR121">
										<hr />
									</td>
									<td class="dsR20">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
									<td class="dsR28">
										<hr />
									</td>
								</tr>
								<tr>
									<td class="dsR28"><input class="dsR77" type="text" name="nameField" value="GR100" size="8" maxlength="5" /></td>
									<td class="dsR28"><textarea class="dsR75" name="contentsTextArea" rows="2" cols="50">Bath And Body Works &quot;Into The Wild&quot;, VS &quot;Clean Fresh&quot;, VS &quot;What The More&quot;</textarea></td>
									<td class="dsR121"><input class="dsR122" type="text" name="jobsField" value="MD1234, MD2548" size="24" /></td>
									<td class="dsR20"><select name="brandPulldown" size="1">
											<option value="GDrive">GRaid</option>
											<option value="GDrive">GDrive</option>
											<option value="Lacie-Rugged">Lacie Rugged</option>
										</select></td>
									<td class="dsR28"><select class="dsR54" name="capacityPulldown" size="1">
											<option value="500-GB">500 GB</option>
											<option value="1-TB">1 TB</option>
											<option value="2-TB">2 TB</option>
											<option value="3-TB">3 TB</option>
											<option value="4-TB">4 TB</option>
										</select></td>
									<td class="dsR28"><input class="dsR77" type="text" name="freespaceField" value="500 GB" size="8" maxlength="8" /></td>
									<td class="dsR28"><select name="userPulldown" size="1">
											<option value="Bullpen">Bullpen</option>
											<option value="Garrett-Tezanos">Garrett Tezanos</option>
											<option value="Paul-La-Calandra">Paul La Calandra</option>
											<option value="Vault">Vault</option>
											<option value="Vincent-Garguilo">Vincent Garguilo</option>
										</select></td>
									<td class="dsR28"><select name="freePulldown" size="1">
											<option value="Yes">Yes</option>
											<option selected="selected" value="No">No</option>
										</select></td>
									<td class="dsR28"><input type="submit" name="submitButtonName" value="Update" /></td>
									<td class="dsR28"><input type="submit" name="submitButtonName" value="Delete" /></td>
								</tr>
								<tr>
									<td class="dsR28"><input class="dsR77" type="text" name="nameField" value="GR299" size="8" maxlength="5" /></td>
									<td class="dsR28"><textarea class="dsR75" name="contentsTextArea" rows="2" cols="50">Victoria's Secret &quot;You Go Girl&quot;</textarea></td>
									<td class="dsR121"><input class="dsR122" type="text" name="jobsField" value="MD1234, MD2548" size="24" /></td>
									<td class="dsR20"><select name="brandPulldown" size="1">
											<option value="GDrive">GRaid</option>
											<option value="GDrive">GDrive</option>
											<option value="Lacie-Rugged">Lacie Rugged</option>
										</select></td>
									<td class="dsR28"><select class="dsR54" name="capacityPulldown" size="1">
											<option value="500-GB">500 GB</option>
											<option value="1-TB">1 TB</option>
											<option value="2-TB">2 TB</option>
											<option value="3-TB">3 TB</option>
											<option value="4-TB">4 TB</option>
										</select></td>
									<td class="dsR28"><input class="dsR77" type="text" name="freespaceField" value="500 GB" size="8" maxlength="8" /></td>
									<td class="dsR28"><select name="userPulldown" size="1">
											<option value="Bullpen">Bullpen</option>
											<option value="Garrett-Tezanos">Garrett Tezanos</option>
											<option value="Paul-La-Calandra">Paul La Calandra</option>
											<option value="Vault">Vault</option>
											<option value="Vincent-Garguilo">Vincent Garguilo</option>
										</select></td>
									<td class="dsR28"><select name="freePulldown" size="1">
											<option value="Yes">Yes</option>
											<option selected="selected" value="No">No</option>
										</select></td>
									<td class="dsR28"><input type="submit" name="submitButtonName" value="Update" /></td>
									<td class="dsR28"><input type="submit" name="submitButtonName" value="Delete" /></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<p></p>
		<script>

			//EXTEND JQUERY WITH DL OBJECT
			$.extend(DL);
			//CALL BACK METHODS DL API
			function onBegin()
			{
				$("#panel").css("left","0px");
			}
			
			function onComplete(msg)
			{
				var method = msg.method;
				if(method == 'brands')
				{
					$.post('/drivelog/'+method,function(data){
						//$("")
						$("#panel").css("left","-4000px");
						$(".brands").html(data);
					});
				}
				if(method == 'capacity')
				{
					$.post('/drivelog/'+method,function(data){
						//$("")
						$("#panel").css("left","-4000px");
						$(".capacity").html(data);
					});
				}
				if(method == 'users')
				{
					$.post('/drivelog/'+method,function(data){
						//$("")
						$("#panel").css("left","-4000px");
						$(".users").html(data);
					});
				}
			}
		</script>
	</body>

</html>