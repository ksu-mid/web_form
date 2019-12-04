<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<h2>Contact form</h2>
<?=$arResult["FORM_HEADER"]?>
	<div class="row">
		<?
		foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
		{
			if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
			{
				echo $arQuestion["HTML_CODE"];
			}
			else
			{
				$id = $arQuestion['STRUCTURE'][0]['ID']; 

				if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'text'):?>
					<div class="col-sm-6">
				<? elseif($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea'):?>
					<div class="col-sm-12">
				<?endif;?>
						<div class="form-group">
							<label for="<?=$id?>"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></label>
							<? if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'text'):?>
								<?=str_replace('<input', '<input class="form-control" id="'.$id.'"', $arQuestion["HTML_CODE"]);?>
							<? elseif($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea'):?>
								<?=str_replace('<textarea', '<textarea class="form-control" id="'.$id.'"', $arQuestion["HTML_CODE"]);?>
							<?endif;?>
						</div>
					</div>
		<?	}
		} 
		?>
				<div class="col-sm-12 text-center">
					<button type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>
				</div>	
	</div>
<?=$arResult["FORM_FOOTER"]?>
<?
} 
?>

