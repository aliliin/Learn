<?php
namespace Learn;

/**
 * 物流接口
 */
class Kdniao
{
    //请求url
    const REQURL = 'http://api.kdniao.com/Ebusiness/EbusinessOrderHandle.aspx';
    //电商ID
    const EBUSINESSID = 1270293;
    //电商加密私钥，快递鸟提供，注意保管，不要泄漏
    const APPKEY = 'd7696d82-95d5-4922-ab95-4e0adee0fe8c';

    // $logisticResult = getOrderTracesByJson();
    // var_dump($logisticResult);
    /**
     * Json方式 查询订单物流轨迹
     */
    public static function getOrderTracesByJson($requestData)
    {
        $datas = [
            'EBusinessID' => self::EBUSINESSID,
            'RequestType' => '1002',
            // 'RequestType' => '8001',
            'RequestData' => urlencode($requestData),
            'DataType'    => '2',
        ];
        $datas['DataSign'] = self::encrypt($requestData, self::APPKEY);
        $result            = self::sendPost(self::REQURL, $datas);
        //根据公司业务处理返回的信息......
        return $result;
    }

    /**
     *  post提交数据
     * @param  string $url 请求Url
     * @param  array $datas 提交的数据
     * @return url响应返回的html
     */
    public static function sendPost($url, $datas)
    {
        $temps = array();
        foreach ($datas as $key => $value) {
            $temps[] = sprintf('%s=%s', $key, $value);
        }
        $post_data = implode('&', $temps);
        $url_info  = parse_url($url);
        if (empty($url_info['port'])) {
            $url_info['port'] = 80;
        }
        // echo $url_info['port'];die;
        $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
        $httpheader .= "Host:" . $url_info['host'] . "\r\n";
        $httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
        $httpheader .= "Content-Length:" . strlen($post_data) . "\r\n";
        $httpheader .= "Connection:close\r\n\r\n";
        $httpheader .= $post_data;
        $fd = fsockopen($url_info['host'], $url_info['port']);
        fwrite($fd, $httpheader);
        $gets       = "";
        $headerFlag = true;
        while (!feof($fd)) {
            if (($header = @fgets($fd)) && ($header == "\r\n" || $header == "\n")) {
                break;
            }
        }
        while (!feof($fd)) {
            $gets .= fread($fd, 128);
        }
        fclose($fd);
        return $gets;
    }

    /**
     * 电商Sign签名生成
     * @param data 内容
     * @param appkey Appkey
     * @return DataSign签名
     */
    public static function encrypt($data, $appkey)
    {

        return urlencode(base64_encode(md5($data . $appkey)));
    }

    public static function getExpressCompany($express = 'YD')
    {
        $list = [
            'SF'     => '顺丰速运',
            'HTKY'   => '百世汇通',
            'ZTO'    => '中通快递',
            'STO'    => '申通快递',
            'YTO'    => '圆通快递',
            'YD'     => '韵达速递',
            'YZPY'   => '邮政快递包裹',
            'EMS'    => 'EMS',
            'HHTT'   => '天天快递',
            'JD'     => '京东物流',
            'QFKD'   => '全峰快递',
            'GTO'    => '国通快递',
            'UC'     => '优速快递',
            'DBL'    => '德邦',
            'FAST'   => '快捷快递',
            'AMAZON' => '亚马逊',
            'ZJS'    => '宅急送',
        ];
        return !empty($express) ? $list[$express] : $list;
    }
}
