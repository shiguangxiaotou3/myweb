#### 登陆
- 请求方式:POST
- 路由:/user/login
- 格式:multipart/form-data

##### 参数
|名称   	|类型	|必填 	|描述	|
|:---   	|:---	|:---	|:---	|
|username	|string	|是		|用户名	|
|password	|string	|是		|密码	|

##### 正确的返回
登陆成功返回access_token,供后续操作认证
```javascript
{
    "success": true,
        "code": 200,
        "message": "OK",
        "data": {
        "token": "cEyE5hr2a-FVg7D3g6155JcY8E8Wkk-Q"
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