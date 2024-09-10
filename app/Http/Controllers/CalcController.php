<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    //
    public function result($value1, $operator, $value2)
    {
        // 各演算子においての条件分岐
        switch ($operator) {
                // 足し算
            case 'addition';
                $result = $value1 + $value2;
                break;
                // 引き算
            case 'subtraction';
                $result = $value1 - $value2;
                break;
                // 掛け算
            case 'multiplication';
                $result = $value1 * $value2;
                break;
                // 割り算
            case 'division':
                if ($value2 != 0) {
                    $result = $value1 / $value2;
                } else {
                    return view('result', ['message' => "エラー : 計算できません。"]);
                }
                break;
            default:
                return view('result', ['message' => "エラー : 無効な演算子です。"]);
        }

        // 計算結果をビューに渡す
        $message = $result;
        return view('result', ['message' => $message]);
    }
}
