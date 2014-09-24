<?php function no_cache()
{
    header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
}


function fa_create_company_link($id= -1)
{
	return nbs(3).anchor(base_url().'account/add_accounts/'.$id,'Add Accounts','class="btn btn-primary"');
}


?>
