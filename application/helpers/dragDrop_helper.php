<?php
ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '80M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

function drag_drop(){
	if( isset($_FILES) ){
		$data = $_FILES;
		$new_loc = 'product_pics/';
		$arr = array();
		if( sizeof( $data ) > 1 )
		{
						for( $i = 0; $i < sizeof( $data ); $i++ )
						{
							$name = $data[$i]['name'];
							$tmp_name = $data[$i]['tmp_name'];
							if( move_uploaded_file($tmp_name, $new_loc.$name) )
							{
								$arr[$i]['path'] = base_url().$new_loc.$name;
							}
							else
							{
								print json_encode(array('error'=>'error'));
							}
						}
			print json_encode( $arr );
		}
		else
		{
			$name = $data[0]['name'];
			$tmp_name = $data[0]['tmp_name'];
			( move_uploaded_file($tmp_name, $new_loc.$name) ) ?
			print json_encode( array('path'=>base_url().$new_loc.$name)) : print json_encode(array('error'=>'error'));
		}

	}
}

?>
