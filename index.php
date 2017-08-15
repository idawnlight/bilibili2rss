<?php
if (isset($_GET["id"])) {

    $data["id"] = $_GET["id"];

    $post_data = array(
        "mid" => $data["id"]
        );
    $info = json_decode(curl_request("http://space.bilibili.com/ajax/member/GetInfo",$post_data,"",0));

    $SubmitVideos = json_decode(file_get_contents("http://space.bilibili.com/ajax/member/getSubmitVideos?mid=".$data["id"]."&page=1&pagesize=5"));
    if ($SubmitVideos->data->count<5) {
        $count = $SubmitVideos->data->count;
    } elseif ($SubmitVideos->data->count == 0) {
        echo json_encode(array("status"=>"400","msg"=>"No Submit Videos"));
        header("Content-Type:application/json; charset=utf-8");
        header("HTTP/1.1 400 Bad request");
        exit();
    } else {
        $count = 5;
    }
    $videos = $SubmitVideos->data->vlist;
    //print_r($videos);

    $data["name"] = $info->data->name;
    $data["description"] = $info->data->sign;
    //echo $data["name"];
    
    date_default_timezone_set('Asia/Shanghai');
    require_once("./rss.php");
} else {
    echo json_encode(array("status"=>"400","msg"=>"Need id"));
    header("Content-Type:application/json; charset=utf-8");
    header("HTTP/1.1 400 Bad request");
    exit();
}

function curl_request($url,$post='',$cookie='', $returnCookie=0){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_REFERER, "http://space.bilibili.com/");
        if($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
        }
        if($cookie) {
            curl_setopt($curl, CURLOPT_COOKIE, $cookie);
        }
        curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        if (curl_errno($curl)) {
            return curl_error($curl);
        }
        curl_close($curl);
        if($returnCookie){
            list($header, $body) = explode("\r\n\r\n", $data, 2);
            preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
            $info['cookie']  = substr($matches[1][0], 1);
            $info['content'] = $body;
            return $info;
        }else{
            return $data;
        }
}

