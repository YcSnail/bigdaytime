<?php
// +----------------------------------------------------------------------
// |  [ 我的梦想是星辰大海 ]
// +----------------------------------------------------------------------
// | Author: yc  and yc@yuanxu.top
// +----------------------------------------------------------------------
// | Date: 2018/10/29 Time: 23:14
// +----------------------------------------------------------------------
namespace app\api\model;
use think\Model;

class Time extends Model{

    protected $createTime = 'end_time';

    public function setTime($title,$end_time){

        $saveData =
            [
                'title'  =>  $title,
                'end_time' =>  $end_time,
                'status'=>0
            ];
        $insertRes = Time::create($saveData);
        return $insertRes;
    }


    public function getTimeList(){

        // 查询数据集
        $timeList = Time::where('status', 0)
            ->order('end_time', 'desc')
            ->field('end_time,title')
            ->select()
            ->toArray();

        return $timeList;
    }

    public function updataTime(){


        $updataRes = Time::save(['status' => -1 ],function($query){
            // 更新status值为1 并且id大于10的数据
            $time = time();
            $query->where('status', 0)->where('end_time', '<', $time);
        });

        return $updataRes;
    }

}