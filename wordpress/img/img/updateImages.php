<?php
$key=$_POST['key'];
$value=$_POST['value'];
$password=$_POST['password'];

if($key == null || $password == null) {
    echo '1';
} else {
    if (md5(md5($password)) == 'ad740c41760c3a6fe8f513e14243c50b') {
         $json_string = file_get_contents("../../img.json", true);// ���ļ��ж�ȡ���ݵ�PHP����
         $array = json_decode($json_string,true);// ��JSON�ַ���ת��PHP����
         if ($value == null) {
             if (array_key_exists($key, $array)) {
                 unset($array[$key]);
                 $json_strings = json_encode($array);
                 file_put_contents("../../img.json", $json_strings);//д��
                 echo "4";
             } else {
                 echo "2";
             }
         } else {
             $array[$key]=$value;
             $json_strings = json_encode($array);
             file_put_contents("../../img.json", $json_strings);//д��
             echo "200";
         }
    } else {
        echo '3';
    }
}
?>