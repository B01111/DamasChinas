<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>DamasChinas</title>
	<meta name="description" content="" />
	
	<script src="gameScript.js"></script>
	<script>
		var flashvars = {
		};
		var params = {
			menu: "false",
			scale: "noScale",
			allowFullscreen: "true",
			allowScriptAccess: "always",
			bgcolor: "",
			wmode: "direct" // can cause issues with FP settings & webcam
		};
		var attributes = {
			id:"DamasChinas"
		};
		swfobject.embedSWF(
			"DamasChinas.swf", 
			"altContent", "800px", "600px", "10.0.0", 
			"expressInstall.swf", 
			flashvars, params, attributes);
	</script>
</head>
<body>
	<div id="altContent" class="contentBox">
		<h1>DamasChinas</h1>
		<p><a href="http://www.adobe.com/go/getflashplayer">Get Adobe Flash player</a></p>
	</div>
</body>
</html>