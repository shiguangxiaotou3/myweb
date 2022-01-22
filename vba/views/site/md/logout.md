#### 注销
- 请求方式:POST
- 路由:/user/logout?access-token=2fEUq35Zhqzs2R19LdG0J0AInWoWJAZL
- 格式:multipart/form-data

##### 参数
|名称   	|类型	|必填 	|描述	|
|:---   	|:---	|:---	|:---	|
|username	|string	|是		|用户名	|
|email		|string	|是		|邮箱	|
|password	|string	|是		|密码	|

##### 正确的返回
注册成功以后将发送验证url至注册邮箱中
```javascript
{
    "success": true,
        "code": 200,
        "message": "OK",
        "data": {
        "message": "注销成功"
    }
}
```

##### 错误的返回
```javascript
{
    "success": false,
        "code": 422,
        "message": "Data Validation Failed.",
        "data": [
        {
            "field": "password",
            "message": "用户名或密码不正确"
        }
    ]
}
```