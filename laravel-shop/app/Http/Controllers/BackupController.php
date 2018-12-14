<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BackupController extends Controller
{
    //
    public function backupList()
    {
        $disk = Storage::disk('local');
        $directory = '/Laravel-Shop';
        // 获取目录下的文件
        $files = $disk->files($directory);
//        dd($files);
        // //获取目录下的所有文件(包括子目录下的文件)
        //  $allFiles = $disk->allFiles($directory);
        //dd($files);
        $db_zips = [];
        foreach ($files as $k => $v) {
            $db_zips[$k]['name'] = substr($v,strpos($v,'/')+1);
            $db_zips[$k]['size'] = $this->count_size(Storage::size($v));            //文件大小
            $db_zips[$k]['time'] = date('Y-m-d H:i:s', Storage::lastModified($v)); //最后修改时间
        }
//        dd($db_zips);
        return json_encode($db_zips);
    }

    //备份数据库
    public function dataBackup()
    {
        $backup = Artisan::call('backup:run', ['--only-db'=>true]);
        //这里注意 参数是以数组的形式
        if ($backup==0) {
            $arr = [
                'error' => 200,
                'msg' => '数据库备份成功'
            ];
        } else {
            $arr = [
                'error' => 400,
                'msg' => '数据库备份失败'
            ];
        }
        return $arr;
    }

    //单位换算
    public function count_size($bit)
    {
        $type = array('Bytes','KB','MB','GB','TB');
        for($i = 0; $bit >= 1024; $i++)//单位每增大1024，则单位数组向后移动一位表示相应的单位
        {
            $bit/=1024;
        }
        return (floor($bit*100)/100).$type[$i];//floor是取整函数，为了防止出现一串的小数，这里取了两位小数
    }
}
