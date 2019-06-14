<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class Paul
{
    static function bangumi()
    {
        $uid = Typecho_Widget::widget('Widget_Options')->bili_id;
        $num = Typecho_Widget::widget('Widget_Options')->display_bgm_num;
        $bgm = file_get_contents('https://api.bilibili.com/x/space/bangumi/follow/list?type=1&pn=2&ps=' . $num . '&vmid=' . $uid);
        $bgm = json_decode($bgm, true);
        $lists = $bgm['data']['list'];
        $titles = array();
        $covers = array();
        $total_count = array();
        foreach ($lists as $key => $list) {
            $titles[] = $list['title'];
            $covers[] = $list['cover'];
            $total_count[] = $list['total_count'];
            echo '<div class="col-6 col-s-4 col-m-3">
                <a class="bangumi-item" href="https://bangumi.bilibili.com/anime/' . $list['media_id'] . '/" target="_blank" rel="nofollow">
                    <img src="' . $list['cover'] . '"/>
                    <h4>' . $list['title']
                . '
                        <div class="bangumi-status">
                            <div class="bangumi-status-bar"></div>
                            <p>集数： ' . $list['total_count'] . '</p>
                        </div>
                    </h4>
                </a>
            </div>';
        }
        return array($titles, $covers, $total_count);
    }

    static function parse_says($content)
    {
        // 匹配每行 放入数组

        preg_match_all('/<p>(.*?)<\/p>/', $content, $says);

        $content = array();
        foreach ($says['1'] as $key => $saying) {
            $content[] = preg_split('/((-){2,}|————|——)/', $saying);  // 匹配提取----|---|--|————|——后的内容

        }
        $author_names = array();
        $say_bodys = array();
        foreach ($content as $key => $value) {
            if (count($value) != 1) {
                $author_names[] = '来源: ' . array_pop($value);   // 分割后数量如果为1 说明作者提取失败
            } else {
                $author_names[] = '';  // 失败情况加入处理
            }

            $say_bodys[] = implode("——", $value);  // 合并多余的分割项
        }

        foreach ($say_bodys as $key => $saying) {
            yield $author_names[$key] => $saying;
        }

    }

    static function get_163_music($par, $key, $token, $cookie)
    {
        $data = array(
            'params' => $par,
            'encSecKey' => $key
        );
        $query = http_build_query($data);
        $options['http'] = array(
            'method' => 'POST',
            'header' => "Content-type:application/x-www-form-urlencoded\r\nCookie:$cookie",
            'content' => $query
        );

        $url = 'https://music.163.com/weapi/v1/play/record?csrf_token=' . $token;
        $context = stream_context_create($options);

        $result = file_get_contents($url, false, $context);
        $json = json_decode($result, true);
        $num = 0;
        $week_data = array();
        foreach ($json['weekData'] as $key => $item) {
            if ($num < 10):
                $playTime = date('H:i:s', $item['song']['song']['playTime']);
                $week_data[] = ['name' => $item['song']['name'], 'id' => $item['song']['song']['id'], 'time' => $playTime, 'num' => $num++];
            else:break;
            endif;
        }
        $num = 0;
        $all_data = array();
        foreach ($json['allData'] as $key => $item) {
            if ($num < 10):
                $playTime = date('H:i:s', $item['song']['song']['playTime']);
                $all_data[] = ['name' => $item['song']['name'], 'id' => $item['song']['song']['id'], 'time' => $playTime, 'num' => $num++];
            else:break;
            endif;
        }

        return [$week_data, $all_data];
    }

}