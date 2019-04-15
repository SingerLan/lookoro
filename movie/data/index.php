<?php  
if ($_GET['name'] != null)
{
	$douban = $_GET['name'];
	$api='https://api.douban.com/v2/movie/search?q='.$douban.'&start=0&count=1';
    $raw=file_get_contents($api);
	echo $raw;

}
if ($_GET['id'] != null)
{
	$douban = $_GET['id'];
	$api1='https://api.douban.com/v2/movie/subject/'.$douban;
	$api1='http://feifeicms.tianqi.cc/douban/?id='.$douban;
	$raw[0]=json_decode(file_get_contents($api1));
	$api2='https://api.douban.com/v2/movie/'.$douban;
	$raw[1]=json_decode(file_get_contents($api1));
	echo(file_get_contents($api1));
}
