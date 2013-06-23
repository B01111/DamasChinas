<script type="text/javascript" language="JavaScript">
	function checkFields($fieldname){
		var elements = document.getElementsByName($fieldname);
		var result = true;
		var i = elements.length -1;
		while(i >= 0 && result){
			if (trim(elements[i].value) == ""){
				result = false;
				alert("Faltan campos por llenar");
			}
			--i;
		}
		return result;
	}
	
	function trim (myString){
		return myString.replace(/^\s+/g,'').replace(/\s+$/g,'')
	}
</script>