<?php


if( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('current_user')) {
	function current_user() {
		$ci =& get_instance();
		if( $user_data = $ci->session->userdata('username') ) {
			return $user_data; //regresa el map de user
		}
		return false;
	}
}

if (!function_exists('saldo')) {
	function saldo() {
		$ci =& get_instance();
		if ($user_data = $ci->session->userdata('card')) {
			$ci->load->model('acceso_model');
			$saldo = $ci->acceso_model->saldo($user_data);
			return $saldo;
		}
		return false;
	}
}

if( ! function_exists('urlsafe_b64encode'))
{
	function urlsafe_b64encode($string)
	{
	    $data = base64_encode($string);
	    $data = str_replace(array('+','/','='),array('-','_',''),$data);
	    return $data;
	}
}

if( ! function_exists('urlsafe_b64decode'))
{
	function urlsafe_b64decode($string)
	{
	    $data = str_replace(array('-','_'),array('+','/'),$string);
	    $mod4 = strlen($data) % 4;
	    if ($mod4) {
	        $data .= substr('====', $mod4);
	    }
	    return base64_decode($data);
	}
}

if( ! function_exists('file_url'))
{
	function file_url($id)
	{
		$ci =& get_instance();
		$ci->load->model('files_model');
		return $ci->files_model->getFileUrl($id);
	}
}

if( ! function_exists('print_content_url') )
{
	function print_content_url($message_id)
	{
		$ci =& get_instance();
		$ci->load->model('content_types_model');
		return $ci->content_types_model->print_url($message_id);
	}
}

if( !function_exists('flash_message') )
{
	function flash_message()
	{
		$ci =&get_instance();
		
		if( $message = $ci->session->flashdata('message') )
		{
			echo "<div id=\"flash_message\">";
			echo $message;
			echo "</div>";
		}
	}
}

if( !function_exists('get_user_info') )
{
	function get_user_info($user_id)
	{
		$ci =&get_instance();
		
		$ci->load->model('users_model');
		$user = $ci->users_model->showUser($user_id);
		
		return $user;
	}
}

if( !function_exists('select_list') ) {
  function select_list( $collection, $name, $selected_id = '', $key_value_ids = array('id', 'name') ) {
      
    $str = "<select id='$name' name='$name'>";
    $str .= "<option value=''>---</option>";
    
    foreach($collection as $item) {
      $str .= "<option value='" . $item[$key_value_ids[0]] . "'";
      $str .= ($item['id'] == $selected_id)?" selected='selected' ":'';
      $str .= " >";
      $str .= $item[$key_value_ids[1]];
      $str .="</option>";
    }
    
    $str .= "</select>";
    
    return $str;
  }
}

if( !function_exists('publication_content') )
{
	function publication_content($content_type)
	{
		$ci =&get_instance();
		$ci->load->model('content_types_model');
		
		if( $content = $ci->content_types_model->validate_content($content_type) )
		{
			return $content[0];	
		}
		
		return false;
	}
}

if( !function_exists('content_comments') )
{
	function content_comments($content_type, $content_id, $company_id)
	{
		$ci =& get_instance();
		$ci->load->model('comments_model');
		$user = current_user();
		
		
		$comments = $ci->comments_model->all($content_type, $content_id, $company_id);
		foreach($comments as $comment):
			
			//Commenter already have a picture?
			$picture = ( $comment['picture'] != '')? str_replace(' ', '%20' ,$comment['picture']) : '/img/profile/none.jpg';
			
			if( $user['permission_level'] > 99 || $comment['user_id'] == $user['id'] ) {
					$delete = " - <a data-comment-id='{$comment['id']}' class='delete_comment' href='#'>Eliminar</a>";
				}
			else {
					$delete = '';
				}
			
			echo "<div class='span-13 comment' id='comment_id_{$comment['id']}'>";
			echo 	"<div class='span-2'>";
			echo 		"<div class='user_photo_mini' style='background-image:url($picture)'></div>";
			echo 	"</div>";
			echo 	"<div class='span-11 last justify comment_content'>";
			echo 		"<span class=\"blue bold\">{$comment['name']}</span><span class='quiet'> - ". human_time($comment['date']) . "</span>$delete<hr style='margin-bottom : 2px; width : 99%;' />";
			echo 			$comment['text'];
			echo 	"</div>";
			echo "</div>";
			
		endforeach;
	}
}

if( !function_exists('show_comment') )
{
	function show_comment($comment_id)
	{
		$ci =& get_instance();
		$ci->load->model('comments_model');
		$user = current_user();
		
		$comment = $ci->comments_model->show($comment_id);
			
		//Commenter already have a picture?
		$picture = ( $comment['picture'] != '')? str_replace(' ', '%20', $comment['picture']) : '/img/profile/none.jpg';
		
		if( $user['permission_level'] > 99 || $comment['user_id'] == $user['id'] ) {
				$delete = " - <a data-comment-id='{$comment['id']}' class='delete_comment' href='#'>Eliminar</a>";
			}
		else {
				$delete = '';
			}
		
		echo "<div class='span-13 comment' id='comment_id_{$comment['id']}'>";
		echo 	"<div class='span-2'>";
		echo 		"<div class='user_photo_mini' style='background-image:url($picture)'></div>";
		echo 	"</div>";
		echo 	"<div class='span-11 last justify comment_content'>";
		echo 		"<span class=\"blue bold\">{$comment['name']}</span><span class='quiet'> - ". human_time($comment['date']) . "</span>$delete<hr style='margin-bottom : 2px; width : 99%;' />";
		echo 			$comment['text'];
		echo 	"</div>";
		echo "</div>";
			
	}
}

if( !function_exists('comment_input') )
{
	function comment_input($content_type, $content_id)
	{
		echo "<textarea data-content-type='$content_type' data-content-id='$content_id' class='comment_input'>Añada un comentario (PULSE ENTER PARA COMENTAR)</textarea>";
		return null;
	}
}
?>
