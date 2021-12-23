<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;
use \common\widgets\webslides\Steps;
$this->title = '地图测试';
$dir = Url::to('img/');
?>
<!-- 第1页 -->
<section class="bg-black-blue aligncenter">
    <span class="background dark" style="background-image:url('<?=  $dir."campaign-creators-pypeCEaJeZY-unsplash.jpg" ?>')"></span>
    <!--.wrap = container (width: 90%) -->
    <div class="wrap">
        <div class="cta text-serif">
            <div class="number">
                <p><span>vba</span></p>
            </div>
            <!--end .number -->
            <div class="benefit">
                <!--<p class="text-subtitle">vbaCloud</p>-->
                <h5>vbaCloud</h5>
                <p>是一个va代码托管和分享仓库,你可以在office办公软件中,直接调用云端海量代码。</p>
                <p></p>
                <p></p>
            </div>
        </div>
    </div>
</section>

<!--第2页 -->
<section>
    <div class="wrap longform">
    <h3><strong>为什么使用vbaCloud?</strong></h3>
    <p>
        <a href="http://www.shiguangxiaotou.com" title="大卫杨">
            <img class="avatar-40" src="<?= $dir.'author.jpg' ?>" alt="时光小偷">
        </a>时光小偷
    </p>
    <p class="text-intro">
       在日常工作中经常要vba处理本地数据，但是每次都重新编写代码比较麻烦，作为一个web开发者于是萌生了一个想法。能否在客户端自动加载云端代码以提高办公效力。<br>
        <strong>答案是可以的</strong>
    </p>

    <h3><strong>原理:</strong></h3>
    <ol >
        <li>
            客户端发出post请求。只允许post
        </li>
        <li>
            服务端收到请求以后，查询数据库，返回包含vba代码的json数据
        </li>
        <li>
            客户端收到json数据后，解析json数据。并将vab代码写入模块或类模版中。
        </li>
    </ol>
    <h3><strong>优势</strong></h3>
    <ol>
        <li>开源免费:代码完成又用户提交,<a>无人工审核</a></li>
        <li>操作简单:只需发送post请求即可返回josn数据</li>
        <li>拓展拓展:自己完成模块依赖关系</li>
    </ol>
</div>
</section>

<!--第3页 -->
<section class="bg-gradient-gray slide current">
    <!--.wrap = container (width: 90%) -->
    <div class="wrap size-50">
        <h3>重要说明：</h3>
        <hr>
        <div class="bg-white shadow">
            <ul class="flexblock reasons">
                <li>
                    <h2>vbaCloud是一个人网站.</h2>
                    <p>由于时间有限部分功能还需要完善希望大家谅解<a href='' title="">choose a demo</a> and customize it in minutes. Be memorable! </p>
                </li>
                <li>
                    <h2>安全性</h2>
                    <p>网站代码完全由用户提交,安全请自行考虑</p>
                </li>
                <li>
                    <h2>使用说明</h2>
                    <p>加载代码无需注册会员,提交代码需注册会员<br>
                    <font style="color: red"><b>自家维护小网站，请勿恶意破坏。多多提交代码</b></font></p>
                </li>
                <li>
                    <h2>本网站没有搭建评论模块</h2>
                    <P>出于隐私保护,请自行调用网站接口与与作者交流</P>
                </li>
            </ul>
        </div>
    </div>
</section>



<!--第4页 -->
<section>
    <div class="wrap">
<?php
    //定义
    $definition = <<<EOT
        <p>是指某一类型的vba代码集合</p>
EOT;
    //命名
    $name =<<<EOT
        <ol>
            <li>用户名称/test</li>
            <li><用户名称>/<模块名称></li>
            <li>英文名称不区分大小</li>
            <li>
                <font class="bg-red">命名可以是中文，但是不建议</font>
            </li>
        </ol>
EOT;
    //属性
    $attribute=<<<EOT
        <ol>
            <li>name: 模块名称 string 必须</li>
            <li>
                type:模块类型 int 必须 1或0
            </li>
            <li>describe:说明 str</li>
            <li>
                inherit:继承关系 str<br>
            </li>
        </ol>
EOT;
    //方法
    $method =<<<EOT
        <ol>
            <li>add():添加模块</li>
            <li>delete():删除模块</li>
            <li>update():修改模块</li>
            <li>search():搜索模块</li>
        </ol>
EOT;

    echo Steps::widget([
        'titer'=>'核心概念-模块',
        'data'=>[
            ['lable'=>"定义",'content'=>$definition],
            ['lable'=>"命名",'content'=>$name],
            ['lable'=>"属性",'content'=>$attribute],
            ['lable'=>"方法",'content'=>$method],
        ],
    ]);
?>
    </div>
</section>

<!--第5页 -->
<section class="bg-gradient-gray">
    <div class="wrap">
        <?php
        //定义
        $definition = <<<EOT
        <p>代码块是指:模块中实现具体功能的函数或过程</p>
EOT;
        //命名
        $name =<<<EOT
        <ol>
            <li>标准模块中函数名称或过程名称不可重复</li>
            <li>不区分大小写</li>
            <li>
                <font class="bg-red">命名可以是，但中文但是不建议</font>
            </li>
        </ol>
EOT;
        //属性
        $attribute=<<<EOT
        <ol>
            <li>name: 模块名称 string 必须</li>
            <li>describe:注释 str 必须已 '单引号开头 </li>
            <li>
                inherit:继承关系 str<br>
            </li>
        </ol>
EOT;
        //方法
        $method =<<<EOT
        <ol>
            <li>add():添加模块</li>
            <li>delete():删除模块</li>
            <li>update():修改模块</li>
            <li>search():搜索模块</li>
        </ol>
EOT;

        echo Steps::widget([
            'titer'=>'核心概念-代码块',
            'data'=>[
                ['lable'=>"定义",'content'=>$definition],
                ['lable'=>"命名",'content'=>$name],
                ['lable'=>"属性",'content'=>$attribute],
                ['lable'=>"asd",'content'=>$method],
            ],
        ]);
        ?>
    </div>
</section>

<section class="aligncenter slide current" >
    <!-- .wrap = container (width: 90%) -->
    <div class="wrap">
        <h2><strong>在几秒钟内开始</strong></h2>
        <p class="text-intro">立即创建您自己的演示文稿。<br>120 多个预制幻灯片随时可用。</p>
        <p>
            <a href="<?= $dir."index.xlsx" ?>" class="button" title="下载网页幻灯片">
                <?= addFa('fa-cloud-download') ?>
                免费下载
            </a>
            <a href="<?= Url::to('sit/word') ?>" class="button" title="下载网页幻灯片">
                <?= addFa('fa-file-word-o') ?>
                阅读文档
            </a>
            <span class="try">
                <a href="https://www.paypal.me/jlantunez/8" title="好人缘:)">
                    <?= addFa('fa-paypal') ?>
                  付你想要的。
                </a>
            </span>
        </p>
    </div>
</section>

<span class="fa-file-word-o"></span>