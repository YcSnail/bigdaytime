<?php
// +----------------------------------------------------------------------
// |  [ 我的梦想是星辰大海 ]
// +----------------------------------------------------------------------
// | Author: yc  and yc@yuanxu.top
// +----------------------------------------------------------------------
// | Date: 2018/11/9 Time: 9:29
// +----------------------------------------------------------------------


namespace app\api\controller;


class Md5 {


    public function get(){

        // 获取全部倒计时信息

        // 获取数据
        $dataArr  = input('post.');

        if (!$dataArr){
            ajaxRes(-1,'data is empty!');
        }

        // 判断数据是否存在
        if (!isset($dataArr['Md5']) || $dataArr['Md5'] !='get' || !isset($dataArr['pslength']) ){
            ajaxRes(-1,'非法请求!');
        }

        $pslength = intval($dataArr['pslength']);

        $password =  $this->getMd5($pslength);
        ajaxRes(0,$password);
    }


    /**
     * @param $length
     * @return string
     */
    private function getMd5($length = 16){

        // 密码字符集，可任意添加你需要的字符
        $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
            'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',
            't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',
            'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        // 在 $chars 中随机取 $length 个数组元素键名
        $keys = array_rand($chars, $length);

        $passwordArr = [];

        for($i = 0; $i < $length; $i++) {
            // 将 $length 个数组元素连接成字符串
            $passwordArr[] = $chars[$keys[$i]];
        }


        //  特殊字符数组
        $specialChars = array('!','@','#', '$', '%', '^', '&', '*',);

        // 特殊字符数量
        $specialNum = floor($length/5);
        $specialkeys = array_rand($specialChars, $specialNum);

        // 随机替换数组内数据
        $randNumArr = [];

        for ($i=0;$i<$specialNum;$i++){

            $randNumArr[] = $this->getRandNum($randNumArr,$length);
            $passwordArr[end($randNumArr)] = $specialChars[$specialkeys[$i]];
        }

        $password = implode('',$passwordArr);
        return $password;

    }

    private function getRandNum($randNumArr,$length){
        $randNum = rand(1,$length);

        if (in_array($randNum,$randNumArr)){
            $this->getRandNum($randNumArr,$length);
        }

        return $randNum;
    }


}