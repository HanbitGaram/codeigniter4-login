<?php

/**
 * UUID 作製機
 *
 * リファレンス - https://www.php.net/manual/tr/function.uniqid.php#94959
 *
 * @param string $method
 * @param String $time
 * @param string $value
 * @return string
 */
function uuidGenerator(String $method='', String $time='', String $value=''): string
{
    $hash = sha1('|METHOD|'.$method.'|TIME|'.$time.'|VALUE|'.$value);
    return sprintf(
        '%08s-%04s-%04x-%04x-%12s',
        substr($hash, 0, 8), // 시간의 low 32비트
        substr($hash, 8, 4), // 시간의 중간 16비트
        // 비트연산
        // ABCD 일 때, AND FFF를 하게 되면 앞에 있는 A 가 빠져서 BCD가 됨.
        // 그때 OR으로 5000을 삽입하면 앞에 5가 빈자리에 들어가서 5BCD가 됨.
        // sprintf 에서, b는 바이너리, x는 Hex, d는 Dec를 의미함.
        (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000, // 4비트의 버전 + 시간의 12비트
        (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000, // 최상위 비트의 1~3, 13~15비트의 클럭 시퀀스
        substr($hash, 20, 12) // 48 비트 노드 아이디
    );
}