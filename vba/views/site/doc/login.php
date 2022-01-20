<!-- 登陆 -->
<div class="container-overview" id="login">
    <dt>
        <h4 class="name">登陆</h4>
    </dt>
    <dd>

        <div class="description">发送POST到http://vba.shiguangxiaotou.com</div>
        <ul>
            <li>请求方式:POST</li>
            <li>路由:/user/login</li>
            <li>格式:multipart/form-data</li>
        </ul>
        <h5>参数:</h5>
        <table class="params">
            <thead>
                <th style="width: 15%">名称</th>
                <th style="width: 10%">类型</th>
                <th style="width: 8%">必填</th>
                <th style="width: 67%">描述</th>
            </thead>
            <tdbody>
                <tr>
                    <td>username</td>
                    <td>string</td>
                    <td>是</td>
                    <td>用户名</td>
                </tr>
                <tr>
                    <td>password</td>
                    <td>string</td>
                    <td>是</td>
                    <td>密码</td>
                </tr>
            </tdbody>
        </table>
        <h5>返回:</h5>
        <p>登陆成功返回access_token</p>
        <pre class="syntax">
            <code class="language-json">
{
    "success": true,
    "code": 200,
    "message": "OK",
    "data": {
        "token": "cEyE5hr2a-FVg7D3g6155JcY8E8Wkk-Q"
    }
}
                        </code>
        </pre>
        <h5>错误:</h5>
        <pre class="syntax">
            <code class="language-json">
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
                        </code>
        </pre>
    </dd>
</div>