<?phpnamespace common\components;use yii\base\Component;use Darabonba\OpenApi\Models\Config;use AlibabaCloud\SDK\Alidns\V20150109\Alidns;use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeDomainRecordsRequest;use AlibabaCloud\SDK\Alidns\V20150109\Models\AddDomainRecordRequest;use AlibabaCloud\SDK\Alidns\V20150109\Models\DeleteSubDomainRecordsRequest;use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeDomainsRequest;use AlibabaCloud\SDK\Alidns\V20150109\Models\DeleteDomainRequest;use AlibabaCloud\SDK\Alidns\V20150109\Models\UpdateDomainRecordRequest;use AlibabaCloud\SDK\Alidns\V20150109\Models\AddDomainRecordResponseBody;use AlibabaCloud\SDK\Alidns\V20150109\Models\DeleteSubDomainRecordsResponseBody;use AlibabaCloud\SDK\Alidns\V20150109\Models\DeleteDomainResponseBody;use AlibabaCloud\SDK\Alidns\V20150109\Models\UpdateDomainRecordResponseBody;use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeRecordLogsRequest;use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeRecordLogsResponseBody;use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeDomainStatisticsRequest;use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeDomainStatisticsResponseBody;/** * Class Dns * @property-read Alidns $client * @property-read array  $domains * @package common\components */class Dns extends Component{    public  $accessKeyId  ='';    public  $accessKeySecret  ='';    private  $_client;    /**     * 初始化链接对象     */    public function init(){        parent::init(); // TODO: Change the autogenerated stub        $config = new Config([            "accessKeyId" =>$this->accessKeyId,            "accessKeySecret" => $this->accessKeySecret,        ]);        $config->endpoint = "alidns.cn-hangzhou.aliyuncs.com";        $this->_client =new Alidns($config);    }    /**     * @return Alidns     */    public  function getClient()    {       return  $this->_client;    }    /**     * 获取所有域名     * @return array     */    public  function getDomains()    {        $client = $this->client;        $describeDomainsRequest = new DescribeDomainsRequest([]);        // 复制代码运行请自行打印 API 的返回值        $body = $client->describeDomains($describeDomainsRequest)->body;        $domains =$body->domains->domain;        $res =[];        foreach ($domains as $domain){            $res[] =$domain->domainName;        }        return $res;    }    /**     * @param $domainName     * @return DeleteDomainResponseBody     */    public function DeleteDomain($domainName)    {        $client = $this->client;        $deleteDomainRequest = new DeleteDomainRequest([            "domainName" => $domainName]);        // 复制代码运行请自行打印 API 的返回值      return  $client->deleteDomain($deleteDomainRequest)->body;    }    /**     * 获取域名的解析记录列表     * @param $domainName     * @return array     */    public function domainRecords($domainName)    {        $client = $this->client;        $describeDomainRecordsRequest = new DescribeDomainRecordsRequest([            "domainName" => $domainName        ]);        // 复制代码运行请自行打印 API 的返回值       $body = $client->describeDomainRecords($describeDomainRecordsRequest)->body;       if($body->totalCount >0){           $records =$body->domainRecords->record;           $res =[];           foreach ($records as $record){               $res[] =[                   'recordId' => $record->recordId,                   'status' => $record->status,                   'type' => $record->type,                   'value' => $record->value,                   'line' => $record->line,                   'ttl' => $record->TTL,                   'priority' =>$record->priority,                   'rr' => $record->RR,                   'domainName' => $record->domainName,                   'weight' => $record->weight,                   'remark' =>$record->remark,                   'locked' =>$record->locked,               ];           }           return $res;       }else{           return [];       }    }    /**     * 获取域名的解析日志     * @param string $domainName     * @return DescribeRecordLogsResponseBody     */    public function domainDescribeRecordLogs( $domainName)    {        $client = $this->client;        $describeRecordLogsRequest = new DescribeRecordLogsRequest([            "domainName" =>$domainName        ]);        // 复制代码运行请自行打印 API 的返回值        return $client->describeRecordLogs($describeRecordLogsRequest)->body;    }    /**     * 获取域名的访问记录     * @param $domainName     * @param $startDate     * @return DescribeDomainStatisticsResponseBody     */    public function domainStatistics($domainName,$startDate)    {        $client = $this->client;        $describeDomainStatisticsRequest = new DescribeDomainStatisticsRequest([            "domainName" => $domainName,            "startDate" => $startDate        ]);        // 复制代码运行请自行打印 API 的返回值       return $client->describeDomainStatistics($describeDomainStatisticsRequest)->body;    }    /**     * 添加解析记录     * @param string $domainName     * @param string $RR     * @param string $value     * @param string $typ     * @return AddDomainRecordResponseBody     */    public function addDomainRecord($domainName,  $RR, $value, $typ="A")    {        $client = $this->client;        $addDomainRecordRequest = new AddDomainRecordRequest([            "domainName" => $domainName,            "RR" => $RR,            "type" => $typ,            "value" => $value        ]);        return $client->addDomainRecord($addDomainRecordRequest)->body;    }    /**     * 删除解析记录     * @param string $domainName 域名     * @param string $RR 主机记录     * @return DeleteSubDomainRecordsResponseBody     */    public function delDomainRecord( $domainName, $RR)    {        $client = $this->client;        $deleteSubDomainRecordsRequest = new DeleteSubDomainRecordsRequest([            "domainName" => $domainName,            "RR" => $RR        ]);        // 复制代码运行请自行打印 API 的返回值       return $client->deleteSubDomainRecords($deleteSubDomainRecordsRequest)->body;    }    /**     * 修改解析记录     * @param $RecordId     * @param $RR     * @param $Type     * @param $Value     * @return UpdateDomainRecordResponseBody     */    public function UpdateDomainRecord($RecordId,$RR,$Type,$Value)    {        $client = $this->client;        $updateDomainRecordRequest = new UpdateDomainRecordRequest([            'RecordId'=>$RecordId,'RR'=>$RR,'Type'=>$Type,'Value'=>$Value        ]);        // 复制代码运行请自行打印 API 的返回值       return $client->updateDomainRecord($updateDomainRecordRequest)->body;    }    /**     * 获取域名近一个月的访问量     * @param $domain     * @return array     */    public function getDomainVisits($domain){        $startDate = date("Y-m-d",time()- 60*60*24*30);        $tmp = $this->domainStatistics($domain,$startDate)->statistics->statistic;        $number =[];        foreach ($tmp as $item){            $number[$item->timestamp]= $item->count;        }        return $number;    }    public function visits($domains){       $number =[];        foreach ($domains as $domain){            $number[$domain] =array_sum(  $this->getDomainVisits($domain));        }        return $number;    }}