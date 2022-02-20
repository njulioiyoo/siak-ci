<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<style type="text/css">
.popover-content{
	max-height: 400px;
	overflow-y: auto;
}
</style>

<table id="grid-user"></table>
<div id="pager-grid-user"></div>

<script type="text/javascript">
$(document).ready(function(){
	$.ajaxSetup({
		global: false
	});

	$("#grid-user").jqGrid({
		styleUI: 'Bootstrap',
		responsive: true,
        url: '<?php echo base_url("user/tableuser");?>',
        mtype: 'POST',
        datatype: "json",
        contentType: "application/json; charset-utf-8",
        colModel: [
            { label: '##', index: 'act', name: 'act', width: 15, search:false, },
            { label: 'Username', index: 'username', name: 'username', width: 35, },
            { label: 'Status', index: 'status', name: 'status', width: 35, },
        ],
        rownumbers: true,
        rownumWidth: 35,
        sortorder: "desc",
        sortname: "id_user",
        height: 'auto',
        rowNum: 10,
        rowList: [5, 10, 20, 50, 100],
		viewrecords: true,
        pager: "#pager-grid-user",
        caption: "<?php echo $title;?>",
    });

    $('#grid-user').jqGrid('filterToolbar'); 
    $('#grid-user').jqGrid('navGrid',"#pager-grid-user", {                
        search: false, // show search button on the toolbar
        add: false,
        edit: false,
        del: false,
        refresh: true
    });

    $("#grid-user").setGridWidth($(".box-content").width());

});

function showpopover(obj) {

	$(obj).popover({
		container: 'body',
		animation: false,
		trigger: 'click',
		html: true,
		placement: 'top',
    	title: '<span class="text-info"><i class="fa fa-info-circle"></i> Description Detail</span> <a href="javascript:void(0);" class="close close-help">×</a>',
    });

}
</script>