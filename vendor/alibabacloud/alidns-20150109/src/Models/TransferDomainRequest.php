<?php

// This file is auto-generated, don't edit it. Thanks.

namespace AlibabaCloud\SDK\Alidns\V20150109\Models;

use AlibabaCloud\Tea\Model;

class TransferDomainRequest extends Model
{
    /**
     * @var string
     */
    public $lang;

    /**
     * @var string
     */
    public $domainNames;

    /**
     * @var string
     */
    public $remark;

    /**
     * @var int
     */
    public $targetUserId;

    /**
     * @var string
     */
    public $userClientIp;
    protected $_name = [
        'lang'         => 'Lang',
        'domainNames'  => 'DomainNames',
        'remark'       => 'Remark',
        'targetUserId' => 'TargetUserId',
        'userClientIp' => 'UserClientIp',
    ];

    public function validate()
    {
    }

    public function toMap()
    {
        $res = [];
        if (null !== $this->lang) {
            $res['Lang'] = $this->lang;
        }
        if (null !== $this->domainNames) {
            $res['DomainNames'] = $this->domainNames;
        }
        if (null !== $this->remark) {
            $res['Remark'] = $this->remark;
        }
        if (null !== $this->targetUserId) {
            $res['TargetUserId'] = $this->targetUserId;
        }
        if (null !== $this->userClientIp) {
            $res['UserClientIp'] = $this->userClientIp;
        }

        return $res;
    }

    /**
     * @param array $map
     *
     * @return TransferDomainRequest
     */
    public static function fromMap($map = [])
    {
        $model = new self();
        if (isset($map['Lang'])) {
            $model->lang = $map['Lang'];
        }
        if (isset($map['DomainNames'])) {
            $model->domainNames = $map['DomainNames'];
        }
        if (isset($map['Remark'])) {
            $model->remark = $map['Remark'];
        }
        if (isset($map['TargetUserId'])) {
            $model->targetUserId = $map['TargetUserId'];
        }
        if (isset($map['UserClientIp'])) {
            $model->userClientIp = $map['UserClientIp'];
        }

        return $model;
    }
}
