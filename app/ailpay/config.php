<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101500691518",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAks4oclFR/O6fvQz74tSn0UwfC2WkDI1bpFFfF4C49EjLpi3YNgeN8n0QNczIcsRTaJ0Qlj22mIafZTmAIroEYh01gdhCJKWz0yXoF9+4uQQvboGIbbueDxwRkOm2Pus9UJI6T8aIZBhzX4Ql+vAoIag/hfmIFiG/JN2EnIg6t8saT115p85DF2DTsqO0rUxwuum4xoVc82orxEJ+siUsSqm22T4NrNvSK16Nby5vM9YTKvN4HS4jhyt3HoqWGFunsG8915+uChRr0ZwZHPpsNY1A5p0seV6JNU8v+WUxxS2LhGrX2S5rTTA8Tpc6dRZBoVqmP0bifvgYZ45x4766hwIDAQABAoIBACocRs/b8ce670k8YziCxYys6C7Nvgv3tHTi/oLwYp14ECqf9egxrI8FPtQf5NO+6yoT+8EM/MatvyU7JD1R3JYESOfxD7ARdA66TeQjQYqY3740G91WNxWgeI137NYJhnIJL/7YNSF5PgcFEhv0LZ7R8z7MADRRA9JgVHzOOwGjJ6vYBJGDiFq4FRH7CuJmhYDDGfd6sUoKBYRu0/GOk0YbZHqhWHVBpnX2wY1R/ywJgHztJpoLgL/UPyJgdiE5Vdta0hy2mwkrOgkG6madn/HQckK3952x0StRvra7M8f9hIVYpAxxwlsPVqklFHlcyTRMXmUP6MqWbZZuXJjl00ECgYEA9Ms8z55mDdx4UIrtX3DaYRft9DXJXLqorfSMBpy2t45hFVeVZEbRg9DXb/fkYymzC18rkwB+ZwVgqe8OxOQQplwEjoK8OoumZLkrrN3dDvyXW471XKche2qgS/fXT4+RXIxre0mtysIvGdZtI3NuWt/X2yaEHuMMSADc+uZ9AiECgYEAmYaVQPR5p3BPpHMctodkYGZO5O1Fh5Xzkees4IbORdOhCv0+BRsdK6Wx3ifx3YxTsXCn4tXRe+LjA6zaqGxkStC5Ui3PNHlYyABBNEwv+NOVr3tiqAVr9IrmGLbAyxxwv+CEsAJJ/tWwNUvQoGBSqQMLmfVBVFTqTNQSV0+Vd6cCgYEA4amFmqOb0sVeSGl535TKS91iZ9E5mnkcTJh2iRXovpfLWYBO4I0EUa6xG6/644sqWZ5XLgGzhMcJUD5ncAwKaUHElZdha9sW/h1RbN9uDIXABhBokgwkKoCl2sJTwy1HRHjSEGpggty1zOzF2XtszOszMvxzqYGG7c2V6NmXfeECgYB1xo0Re3soPDycx8IrNMqIOXQkovFIBn0IXVZ+GGx9nNBagdPmTtqd9UryRmqBr3k1Elt45NcD1xaYZy6HLj/yNRU2OfZPJxg4thlPaXMTzB10tY8FnsMmorfKFcjpCDRmvnKMI/VoDb5T5IlzvvEqvy9TOJaZf1sO/VHksSTU2QKBgAdHpoMYKQBjZDItFIUegFakfRycDSSR+SPVhvp8hdN45JwmyMkxSnLh27rValzJLskATk0uUefP6ojLzp7Ddl5wWrBxbzhdvK2A82OnZSEj32wWZG+j0+4yaHL83P8+f+nqOpsBN3mpDL5N6zAOF4PxNRvBZOMFGJHPYBx+xnZB",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.1908php.com/goods/pay2",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApbKIn0208oEvIiN/XyuC5Ghw18uu/XXlEDH2E+IRUahPqENYr5iKtE/SsEonpnvB4hQBou7Uj3UEcz8VXcCiOZiHxrK3/PEnDVkNEgIeAN2DuCgMBbkDnORU/On7NzF8UoaP3jZv9XvFcmiO14gMHRHbwN1zviMMW2PaD5UOxbCP9nvltGO5u+g7hZqLepSaJD8p26rZQnsTrKy0Lc9/MVAN9E2aFn3DE3aAxaeO4zjNvHali5gyzUz53C2jVQ/9Y5jGqbI/UKBYufcoiGBhXsSRNuzGpVmEl8NssF+AOCvwPnKIlTfANhn9HDBcSggR9+byrmX2OZwq1hhjzmpTAQIDAQAB",
		
	
);