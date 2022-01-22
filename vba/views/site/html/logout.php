<!-- logout --><div class="container-overview" id="logout"><h4 class="name">注销</h4>
<ul>
<li>请求方式:POST</li>
<li>路由:/user/logout?access-token=2fEUq35Zhqzs2R19LdG0J0AInWoWJAZL</li>
<li>格式:multipart/form-data</li>
</ul>
<h5>参数</h5>
<table class="params"><thead><th style="width: 15%">名称</th><th style="width: 10%">类型</th><th style="width: 8%">必填</th><th style="width: 67%">描述</th></thead>
<tbody>
<tr><td align="left" class="name">username</td><td align="left">string</td><td align="left">是</td><td align="left">用户名</td></tr>
<tr><td align="left" class="name">email</td><td align="left">string</td><td align="left">是</td><td align="left">邮箱</td></tr>
<tr><td align="left" class="name">password</td><td align="left">string</td><td align="left">是</td><td align="left">密码</td></tr>
</tbody>
</table>
<h5>正确的返回</h5>
<p>注册成功以后将发送验证url至注册邮箱中</p>
<pre class="syntax"><code class="language-javascript">{
    "success": true,
        "code": 200,
        "message": "OK",
        "data": {
        "message": "注销成功"
    }
}
</code></pre>
<h5>错误的返回</h5>
<pre class="syntax"><code class="language-javascript">{
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
</code></pre>
</div>