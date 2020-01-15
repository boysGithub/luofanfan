<?php

function contentSplit($form)
{
    dd($form);
    $tmp = [];
//        $a = '<p>fasfsafafsajhfjka<br/></p><p>afshfhakfafakf</p><p><img src="/storage//uploads/image/2020/01/14/06.jpg" title="/uploads/image/2020/01/14/06.jpg" alt="06.jpg"/><img src="/storage//uploads/image/2020/01/14/13.jpg" title="/uploads/image/2020/01/14/13.jpg" alt="13.jpg"/><img src="/storage//uploads/image/2020/01/14/07.jpg" title="/uploads/image/2020/01/14/07.jpg" alt="07.jpg"/></p><p>fhasjfkhasjkfhkajf</p><p>asfhaskfhajkhfjka</p><p>ashfakshfskakf</p><p><img src="/storage//uploads/image/2020/01/14/06.jpg" title="/uploads/image/2020/01/14/06.jpg" alt="06.jpg"/><img src="/storage//uploads/image/2020/01/14/07.jpg" title="/uploads/image/2020/01/14/07.jpg" alt="07.jpg"/></p><p><img src="/storage//uploads/image/2020/01/14/13.jpg" title="/uploads/image/2020/01/14/13.jpg" alt="13.jpg"/></p>';
//        $a = '<p>fasfsafafsajhfjka<br/></p><p>afshfhakfafakf</p><p><img src="/storage//uploads/image/2020/01/14/13.jpg" title="/uploads/image/2020/01/14/13.jpg" alt="13.jpg"/></p>';

    // 提取前言
//        dd($this->b($form->前言));
//        dd($a);
//        dd($this->b($a));

    // 提取行程简介
    $tmp['itinerary'] = itinerary($form);

    // 提取行程介绍

    return $tmp;
}

/**
 * 提取行程
 * @param $form
 * @return array
 */
function itinerary($form)
{
    $tmp = [];
    for ($i = 1; $i <= $form->trip; $i ++) {
        $tmp["D{$i}"] = $form["D{$i}"];
    }
    return $tmp;
}
