<?php
namespace app\api\controller;

class Time
{
    public function get()
    {

        // 获取全部倒计时信息

        // 获取数据
        $dataArr  = input('post.');

        if (!$dataArr){
            ajaxRes(-1,'data is empty!');
        }

        // 判断数据是否存在
        if (!isset($dataArr['getTime']) || $dataArr['getTime'] !='yc' ){
            ajaxRes(-1,'非法请求!');
        }

        // 检查全部倒计时 是有有效
        $timeRes = $this->checkTimeList();

        // 判断是否有已经
        if ($timeRes){
            ajaxRes(0,$timeRes);
        }

        ajaxRes(-1,'数据不存在!');
    }


    public function add(){
        // 新增倒计时

        // 获取数据
        $dataArr  = input('post.');

        if (!$dataArr){
            ajaxRes(-1,'data is empty!');
        }

        // 判断数据是否存在
        if (!isset($dataArr['end_time']) || !isset($dataArr['title']) ){
            ajaxRes(-1,'非法请求!');
        }

        // 默认按用户处理
        $Time = model('Time');

        // 检查时间是否合法
        $checkTime = strtotime($dataArr['end_time']);

        if (strlen($checkTime) != 10){
            ajaxRes(-1,'非法时间!');
        }

        $nowTime = time();

        if ($nowTime >= $checkTime){
            ajaxRes(-1,'截止时间不能小于当前时间!!');
        }

        $timeRes = $Time->setTime($dataArr['title'],$checkTime);

        if ($timeRes){
            ajaxRes(0,'新增成功!');
        }

        ajaxRes(-1,'保存失败!');

    }


    /**
     * 检查时间列表
     * 是否失效
     */
    private function checkTimeList(){

        // 默认按用户处理
        $Time = model('Time');

        $Time->updataTime();

        $timeRes = $Time->getTimeList();

        if ($timeRes){
            ajaxRes(0,$timeRes);
        }

        ajaxRes(-1,'数据不存在!');

    }


}
