<script type="text/javascript">
$(document).ready(function(){
	$("#personLookupInput").focus(function(){
		if ($("#personLookupInput").val() == "Search...") {
			$("#personLookupInput").val("");
		} else {
			$("#personLookupInput").select();
		}
	});

	$("#personLookupInput").blur(function(){
		if ($("#personLookupInput").val() == "") {
			$("#personLookupInput").val("Search...");
		}
	});
	
	$("#personLookupInput").keyup(function(){
		var name = $("#personLookupInput").val();
		if (name != "Search..." && name != '') {
			$("#personLookupResults").load("/people/lookup/<?=$entityId?>/" + escape(name));
		}
	});
});

function selectLookupResult(id, name)
{
	setLookupSelection("<?=$entityId?>", id, name);
	$.facebox.close();
}
</script>
<p style="color:#000">Search for a family member by first and/or last name.</p>
<br/>
<input id="personLookupInput" type="text" value="Search..." />
<div id="personLookupResults" style="height:160px;"></div>