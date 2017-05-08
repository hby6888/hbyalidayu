<?php
namespace alidayu;
use \think\Config;
class Sms{
	public static function sendCode($name,$tel,$code,$num) {
		$c = new TopClient;
		$c->appkey = Config::get("top.appkey");//appkey
		$c->secretKey = Config::get("top.secret");//appSec
		$req = new AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("123456");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName("签名");
		$req->setSmsParam("{\"name\":\"$name\",\"number\":\"$num\",\"msg\":\"$code\",\"time\":\"30\"}");//我这个模板用了四个参数
		$req->setRecNum($tel);
		$req->setSmsTemplateCode("SMS_7560149");//模板
		$resp = $c->execute($req);
		return $resp;
	}
}
?>
