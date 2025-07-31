<div class="no-pagination">
    <ul class="no-page-list">
        <?
			if ($listCurPage > 1) {
				$prevpage = $listCurPage - 1;
		?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link" onClick="goListMove(<?=$prevpage?>, '<?=$PHP_SELF?>');">
                <i class="bx bx-chevron-left"></i>
            </a>
        </li>
        <? } else { ?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link">
                <i class="bx bx-chevron-left"></i>
            </a>
        </li>
        <? } ?>
        
        <?
			for ($x = ($listCurPage - $pageBlock); $x < (($listCurPage + $pageBlock) + 1); $x++) {

			   if (($x > 0) && ($x <= $Page)) {
				   if ($x == $listCurPage) {
		?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link active"><?=$x?></a>
        </li>
        <? 
            }else{
		?>
        <li class="no-page-item">
            <a href="javascript:void(0);" onClick="goListMove(<?=$x?>, '<?=$PHP_SELF?>');" class="no-page-link"><?=$x?></a>
        </li>
        <?
					} //end else
				} //end if 
			} //end for
		?>

        <?
			if ($listCurPage != $Page) {
				 $nextpage = $listCurPage + 1;
		?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link" onClick="goListMove(<?=$nextpage?>, '<?=$PHP_SELF?>');">
                <i class="bx bx-chevron-right"></i>
            </a>
        </li>
        <?
			}else{
		?>
        <li class="no-page-item">
            <a href="javascript:void(0);" class="no-page-link">
                <i class="bx bx-chevron-right"></i>
            </a>
        </li>
        <?
			}
		?>
    </ul>
</div>

<script>
function goListMove(start, url){
	$("#frm").append("<input type='hidden' name='page' value='"+start+"'>");
	$("#frm").attr("action", url);
	$("#frm").submit();
}
</script>