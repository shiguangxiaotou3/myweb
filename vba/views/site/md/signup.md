#### 用户注册
- 请求方式:POST
- 路由:/user/signup
- 格式:multipart/form-data

##### 参数:
|名称   	|类型	|必填 	|描述	|
|:---   	|:---	|:---	|:---	|
|username	|string	|是		|用户名	|
|email		|string	|是		|邮箱	|
|password	|string	|是		|密码	|

##### 正确的返回:
注册成功以后将发送验证url至注册邮箱中
```
{
    "success": true,
    "code": 200,
    "message": "OK",
    "data": {
        "message": "注册成功，请前往邮箱验证",
        "url": "http://vba.shiguangxiaotou.com/site/verify-email?token=syX9or7vIGqShRw05H0Pu9PcfZTlCNFJ_1642694585"
    }
}
```

##### 错误的返回:
```
{
    "success": false,
    "code": 422,
    "message": "Data Validation Failed.",
    "data": [
        {
            "field": "username",
            "message": "此用户名已被占用."
        },
        {
            "field": "email",
            "message": "此电子邮件地址已被占用."
        }
    ]
}
```
