<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016080500176115",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIICXAIBAAKBgQCdhEKa1vGD9BSqOerGYbahYrJkiEcKfEFBucRjMxfqaonQafx3yx5g2GHyS52W/cVFneDC2T20oFGU2dJ8Q48vDntTXT4bcDSl10G5u4b8tX/OjfYF2mnxXor/oWZIPaHNzk7i3OiHjS6qiFS5wr6VlaLEsM+dIfa35X+6OSZQcwIDAQABAoGAUokO7VtbSa0HdvrKDhD9RSsWFp9huhjJiMryIJiRG3+fntkqNQr1bAF1sSP1+zwVthi3wOFb991ZYgmQxRQRXeBjWRu4zXgO/MkJI/HU6hxM3fNKsiewm2bRQHFDu/USaTaI116BcPD8GZb9wUHkeppNIZzaSIyTyrqCCw+55iECQQDJIx+Epg0TAkL1LtM2q6Ci6khds3IL07EAh88BZj3BzOQcmqQatVFdIaMCW8eMXp/TCwCbUga+oE+TQ605oPP9AkEAyHs6roElWTKWtYn99vgyDEUdOQ1PHXBT7t7Ydb6jRcf76CObSxC29bdeZOhVuPiaIlC082C92QCm5SY2E34pLwJAcASKoiKkd2i0B767TOBKx1C5Ws38fw+3rTb1l67sSAmnJTMOn/1JQhfgpAifWtK8KhofjWEidnnrt3VifQzhtQJAJx9NC0KufCKQIGsGQUybz6MpGboMJ02FQ4b/LLL//50P/nP8WQCxA3A+HmjsWYVB5tJjDV9ijNdAulTjlpg3BwJBAJJYuzIR/oMm4FtkfkazB2ZhaBrWqPkw/ULZccCCk145ohQuaCr+m432Fs0b15AdLb/Nw3kygDyryLDv72GoFY8=",
		
		//异步通知地址
		'notify_url' => "http://192.168.1.100/commerce_alipay_F2F/notify",
		
		//同步跳转
		'return_url' => "http://192.168.1.100",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
);
