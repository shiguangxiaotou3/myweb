<?php

namespace common\components\dns;

use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeDomainsRequest;
use \common\components\Dns;

class Domain extends \common\components\Dns
{




    public function getDomains(){
        $client =$this->client;
        $describeDomainsRequest = new DescribeDomainsRequest([]);
        // 复制代码运行请自行打印 API 的返回值
        $body = $client->describeDomains($describeDomainsRequest)->body;
        return $body->domains->domain;
    }
}