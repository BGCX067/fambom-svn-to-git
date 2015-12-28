<script type="text/javascript">
function setLookupSelection(entityId, id, name)
{
	$("#Person" + entityId + "Id").val(id);
	$("#Person" + entityId + "Name").html(name);
	
	if (id) {
		$("#Person" + entityId + "AssignLink").css("display", "none");
		$("#Person" + entityId + "RemoveLink").css("display", "inline");
	} else {
		$("#Person" + entityId + "AssignLink").css("display", "inline");
		$("#Person" + entityId + "RemoveLink").css("display", "none");
	}
}
</script>
<h1>Add a family member</h1>
<?=$form->create('Person')?>
<table>
	<tr>
		<td style="vertical-align:top;">
			<?=$form->input('first_name', array('class' => 'name'))?>
			<?=$form->input('middle_name', array('class' => 'name'))?>
			<?=$form->input('last_name', array('class' => 'name'))?>
			<?=$form->input('maiden_name', array('class' => 'name'));?>
			<?php
			echo $form->input('sex', array(
				'type' => 'radio',
				'legend' => array(),
				'options' => array('M' => 'Male', 'F' => 'Female')
			));
			?>
		</td>
		<td style="vertical-align:top;">
			<?php
			echo $form->input('household_id', array(
				'type' => 'select',
				'options' => $households
			));
			?>
			<div>
				<label>Father</label>
				<?=$form->input('father_id', array('type' => 'hidden'))?>
				<?php $father_name = $father['Person']['first_name'] . ' ' . $father['Person']['last_name']; ?>
				<span id="PersonFatherName"><?=$father_name?></span>
				<a id="PersonFatherAssignLink" href="/people/lookup/Father" rel="facebox" style="display:<?=empty($father)?'inline':'none'?>">[assign]</a>
				<a id="PersonFatherRemoveLink" href="javascript:setLookupSelection('Father', '', '')" style="display:<?=empty($father)?'none':'inline'?>">[remove]</a>
			</div>
			<div>
				<label>Mother</label>
				<?=$form->input('mother_id', array('type' => 'hidden'))?>
				<?php $mother_name = $mother['Person']['first_name'] . ' ' . $mother['Person']['last_name']; ?>
				<span id="PersonMotherName"><?=$mother_name?></span>
				<a id="PersonMotherAssignLink" href="/people/lookup/Mother" rel="facebox" style="display:<?=empty($mother)?'inline':'none'?>">[assign]</a>
				<a id="PersonMotherRemoveLink" href="javascript:setLookupSelection('Mother', '', '')" style="display:<?=empty($mother)?'none':'inline'?>">[remove]</a>
			</div>
			<div>
				<label>Spouse</label>
				<?=$form->input('spouse_id', array('type' => 'hidden'))?>
				<?php $spouse_name = $spouse['Person']['first_name'] . ' ' . $spouse['Person']['last_name']; ?>
				<span id="PersonSpouseName"><?=$spouse_name?></span>
				<a id="PersonSpouseAssignLink" href="/people/lookup/Spouse" rel="facebox" style="display:<?=empty($spouse)?'inline':'none'?>">[assign]</a>
				<a id="PersonSpouseRemoveLink" href="javascript:setLookupSelection('Spouse', '', '')" style="display:<?=empty($spouse)?'none':'inline'?>">[remove]</a>
			</div>
		</td>
	</tr>
</table>
<div>
	<input type="submit" value="Cancel" onclick="window.location='/people/view/<?=$person['Person']['id']?>';return false;" />
	<input type="submit" value="Save" />
</div>
<?=$form->end()?>