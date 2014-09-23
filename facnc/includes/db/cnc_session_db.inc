<?php
	function get_cnc_session($session_id)
	{
		set_global_connection();

		$sql = "SELECT * FROM ci_sessions WHERE session_id='".$session_id."'";


		$result = db_query($sql, "could not get user");


		return db_fetch($result);
	}
?>
