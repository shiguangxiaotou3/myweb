<!-- 登陆 -->
<div class="container-overview" id="signup">
    <dt>
        <h4 class="name">用户注册</h4>
    </dt>
    <dd>
        <div class="description">发送POST到http://vba.shiguangxiaotou.com/user/signup</div>
        <ul>
            <li>请求方式:POST</li>
            <li>路由:/user/signup</li>
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
                    <td>email</td>
                    <td>string</td>
                    <td>是</td>
                    <td>邮箱</td>
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
        <p>注册成功以后将发送验证url至注册邮箱中</p>
        <pre class="syntax">
            <code class="language-json">
{
    "success": true,
    "code": 200,
    "message": "OK",
    "data": {
        "message": "注册成功，请前往邮箱验证",
        "url": "http://vba.shiguangxiaotou.com/site/verify-email?token=syX9or7vIGqShRw05H0Pu9PcfZTlCNFJ_1642694585"
        }}
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
            "field": "username",
            "message": "此用户名已被占用."
        },
        {
            "field": "email",
            "message": "此电子邮件地址已被占用."
        }
    ]
}
                        </code>
        </pre>
    </dd>
</div>