<?php
// 直接新增
add_action('save_post', function($post_id, $post, $update){
	if(!$update && $post->post_status == 'publish'){

		$url	= apply_filters('baiduz_zz_post_link', get_permalink($post_id), $post_id);

		wpjam_notify_baidu_zz($url);
		wpjam_notify_xzh($url);
	}
}, 10, 3);

// 修改文章
add_action('post_updated', function($post_id, $post_after, $post_before){
	if($post_after->post_status == 'publish'){
		$url	= apply_filters('baiduz_zz_post_link', get_permalink($post_id), $post_id);

		if($post_before->post_status == 'publish'){
			wpjam_notify_baidu_zz($url, true);
			wpjam_notify_xzh($url, true);
		}else{
			wpjam_notify_baidu_zz($url);
			wpjam_notify_xzh($url);
		}
	}
}, 10, 3);

add_filter('wpjam_basic_sub_pages', function($subs){
	$subs['baidu-zz']	=[
		'menu_title'	=>'百度站长',
		'function'		=>'tab',
		'page_file'		=> WPJAM_BASIC_PLUGIN_DIR.'extends/admin/pages/baidu-zz.php',
		'tabs'			=>[
			'baidu-zz'	=>['title'=>'百度站长',	'function'=>'option',	'option_name'=>'baidu-zz'],
			'xzh'		=>['title'=>'熊掌号',	'function'=>'option',	'option_name'=>'xzh'],
			'batch'		=>['title'=>'批量提交',	'function'=>'wpjam_baidu_zz_batch_page'],
		]
	];

	return $subs;
});


