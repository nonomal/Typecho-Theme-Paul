<?php
/**
 * 移植主题
 * 设计: Paul
 * 来源: paul.ren
 *
 * @package Paul Theme
 * @author Dreamer-Paul & Innei
 * @design Dreamer-Paul
 * @deploy Innei
 * @version 1.4 release
 * @link https://paul.ren
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
require_once 'functions.php';
require_once 'Pual.php';
require_once 'pages.php';
?>
<main>
    <nav class="navigation">
        <a href="<?php $this->options->siteUrl(); ?>" class="active">首页</a>
        <?php foreach ($GLOBALS['stack'] as $key => $item):
            if ($item['template'] == 'page-index.php')
                echo '<a href="' . $item['permalink'] . '">' . $item['title'] . '</a>';
            ?>
        <?php endforeach; ?>
    </nav>
    <section class="me">
        <div class="my-avatar">
            <img src="<?php if ($this->options->avatar): $this->options->avatar(); else: $this->options->themeUrl('src/img/avatar.jpeg');endif; ?>">
        </div>
        <div class="my-info">
            <h1><?php $this->author() ?></h1>
            <p><?php $this->options->description() ?></p>
            <div class="social-icons">
                <?php if ($this->options->github_username): ?>
                    <a href="https://github.com/<?php $this->options->github_username(); ?>" target="_blank"
                       ks-tag="bottom"
                       ks-text="GitHub"><i
                                class="fa fa-github" style="color: #44006f"></i></a>
                <?php endif; ?>
                <?php if ($this->options->weibo_id): ?>
                    <a href="https://weibo.com/<?php $this->options->weibo_id(); ?>" target="_blank" ks-tag="bottom"
                       ks-text="新浪微博"><i
                                class="fa fa-weibo" style="color: #e6162d"></i></a>
                <?php endif; ?>
                <?php if ($this->options->netease_id): ?>
                    <a href="https://music.163.com/#/user/home?id=<?php $this->options->netease_id() ?>" target="_blank"
                       ks-tag="bottom"
                       ks-text="网易云">
                        <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M681.557145 0.082986c10.348315 1.684609 20.804511 2.879603 31.036645 5.128515 35.949398 7.916834 68.139544 23.833488 96.545543 47.160763 18.638584 15.30256 26.248371 35.252318 20.854301 58.894939-4.846364 21.252633-18.439419 35.567663-39.4099 41.683708-19.825279 5.784102-37.758485 1.394159-54.040276-11.659488-20.630241-16.539046-43.534289-27.982772-70.985953-25.534695-23.260887 2.074642-45.509348 26.54712-43.509393 48.39725 0.896245 9.775713 4.389943 19.327365 6.871214 28.937107 4.389943 16.987169 8.904364 33.932845 13.368994 50.895119 0.771767 2.929395 1.485444 5.261292 5.576638 5.485354 62.529712 3.41901 118.860393 23.750502 169.06673 61.475793 49.359884 37.0946 89.773911 81.599821 116.860438 137.532171 19.875071 41.044718 31.020048 84.38814 33.966039 129.88919 3.916924 60.455069-3.18665 119.607264-26.721389 175.464927-54.695863 129.77301-150.92606 213.472369-286.201021 251.961128a474.785984 474.785984 0 0 1-157.631303 17.335709c-110.985051-6.31521-207.132263-48.247876-288.134588-124.063595C129.154652 824.280184 79.330049 732.332048 61.99434 624.384273 38.409809 477.566004 74.583268 345.917518 170.249162 231.754115c52.554833-62.71228 118.130119-107.906283 194.601425-137.084049 26.356253-10.057865 55.202076-0.69708 69.66648 22.323149 14.771451 23.501545 11.310948 53.741528-9.161619 72.463097-5.784102 5.286188-13.086842 9.460368-20.389582 12.439554-116.586585 47.600587-193.613895 131.424425-224.202418 253.670634-29.67568 118.619734-3.435607 227.181604 72.338619 322.839199 47.501004 59.965454 108.860618 100.238406 183.132804 120.013894 48.007217 12.779795 96.50405 13.61795 145.407512 6.057955 50.446996-7.800654 97.557968-24.389492 139.814278-53.318301 58.148068-39.808232 99.566222-92.902471 120.279447-160.419623 17.891713-58.314039 18.505807-117.175783-3.601578-175.041699-17.79213-46.571565-49.227107-82.404782-88.661903-111.955984-21.070065-15.783877-43.691962-28.123848-69.483912-34.165205-1.170098-0.273853-2.365092-0.40663-4.497824-0.75517 3.518593 13.50177 6.796527 26.31476 10.182344 39.094555 8.17409 30.83748 16.539046 61.633466 24.580359 92.512438 17.468486 67.110521 0.572601 125.905877-45.642126 176.012632-42.745925 46.339205-97.167935 66.496427-159.598064 60.45507-69.500509-6.730139-119.10935-44.447131-151.482064-105.516295-16.953975-31.982682-24.265013-66.446636-25.61768-102.512213-2.149329-57.426092 11.252859-110.445644 44.148383-157.830469 35.327005-50.903417 84.27196-83.558283 142.088085-103.856582 4.547615-1.593325 9.153321-3.053873 14.4893-4.821468-3.103665-11.808863-6.356703-23.335574-9.153321-34.978465-3.850536-16.007938-8.804781-31.924592-10.738347-48.189785-5.734311-48.081904 9.028842-89.914987 42.248011-124.926646C578.198477 25.592784 611.201883 7.410621 650.727964 1.975059 655.084712 1.377562 659.424863 0.713677 663.765014 0.082986h17.792131zM558.124241 373.394077c-34.239892 10.879423-63.807691 27.484858-85.964868 55.135687-29.667381 37.019913-35.584261 79.541776-26.115594 124.744078 4.912752 23.460052 16.389672 43.550886 36.530297 57.567168 25.186155 17.526576 59.484137 16.771406 85.823792-1.460548 26.920555-18.638584 38.903688-48.704297 31.036646-79.541777-8.613914-33.775173-17.775533-67.417568-26.688196-101.126352l-14.622077-55.318256z"
                                  fill="#c20c0c"></path>
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if ($this->options->bili_id): ?>
                    <a href="https://space.bilibili.com/<?php $this->options->bili_id(); ?>" target="_blank"
                       ks-tag="bottom" ks-text="哔哩哔哩">
                        <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M285.025979 597.688086c13.74415-0.608148 26.515263-1.459556 39.164746-1.702815 54.854971-0.973037 108.736905 5.594964 159.942986 26.272004 25.055707 10.095261 49.260007 21.771707 71.031714 38.191709 17.879558 13.500891 21.771707 30.285782 13.622521 55.098231-5.108445 15.325336-15.325336 26.880152-28.218078 36.975412-30.407412 23.717781-62.274379 45.124599-98.884904 57.165935-25.663856 8.514075-52.300748 14.960447-79.05927 19.095854-35.150968 5.473334-70.788455 7.905927-106.304312 11.189928-7.297779 0.729778-14.717187-0.243259-22.014966-0.24326-3.770519 0-4.743556-1.946074-4.865186-5.230074-0.973037-16.176743-1.702815-32.475116-3.162371-48.651859-1.824445-20.920299-3.892149-41.840599-6.324742-62.639269-3.284-29.069486-6.93289-58.017342-10.581779-86.965197-3.770519-30.529041-7.662668-60.936453-11.311557-91.465495-3.648889-29.799264-6.93289-59.720157-10.825039-89.51942-4.378667-34.056301-9.243853-68.112602-13.865779-102.168904-5.473334-40.259413-13.014372-80.153938-23.352893-119.440314-0.486519-1.702815 0.973037-5.473334 2.432593-5.959852 34.42119-13.86578 68.96401-27.366671 103.3852-41.110821 11.433187-4.621927 12.406224-5.959853 12.527854 8.514075 0.12163 61.666231 0.364889 123.332462 1.337926 184.998694 0.486519 32.110227 1.702815 64.220454 3.892149 96.209051 2.675852 39.043117 6.81126 78.086234 10.33852 117.12935 0 1.702815 0.729778 3.284 1.094667 4.257037z m68.72075 179.038841c31.866968-24.08267 63.004157-47.678822 94.262977-71.396603-3.892149-5.594964-89.76268-39.286376-109.953201-43.786673 5.108445 38.07008 10.33852 76.01853 15.690224 115.183276zM709.999966 764.563962c-16.420002-166.024468-30.285782-333.873382-62.03112-500.749257 10.33852-1.216296 20.67704-2.675852 31.13719-3.52726 12.041335-1.094667 24.2043-1.581185 36.245635-2.554223 10.095261-0.851408 13.86578 1.824445 14.473928 11.676447 1.824445 26.393633 3.40563 52.787267 5.230075 79.1809 2.432593 35.637487 4.986816 71.396603 7.541038 107.03409 1.824445 25.663856 3.40563 51.449341 5.473334 77.113196 2.310963 28.096449 4.865186 56.071267 7.419408 84.167716 1.824445 20.67704 3.52726 41.47571 5.594964 62.152749 2.189334 22.379855 4.621927 44.75971 6.93289 67.139566 0.608148 6.446371 1.337926 12.892743 1.824445 19.339114 0.243259 3.52726-1.702815 4.013778-4.986816 3.648889-17.879558-1.824445-35.759116-3.162371-54.854971-4.621927zM561.125278 524.10215c14.473928-2.067704 28.461337-4.378667 42.448747-5.959853 10.095261-1.216296 20.312151-1.337926 30.407412-2.310963 5.473334-0.486519 9.000594 1.459556 9.852001 6.81126 2.310963 14.230669 4.743556 28.582967 6.446371 42.935266 2.797482 23.839411 4.986816 47.800451 7.541039 71.639862 2.189334 20.920299 4.378667 41.718969 6.81126 62.639268 2.675852 22.379855 5.594964 44.638081 8.392445 66.896306 0.851408 6.568001 1.459556 13.257632 2.310964 20.433781-20.433781 2.554223-40.381043 5.108445-61.422972 7.905927-17.514669-90.249198-35.029338-179.768619-52.787267-270.990854zM874.07836 802.147523c-19.704003 0-38.678228 0.12163-57.652453-0.243259-1.581185 0-4.378667-2.797482-4.500296-4.500297-2.919112-30.407412-5.473334-60.693194-8.149187-91.100606l-7.662668-84.654234c-2.675852-29.069486-5.230075-58.138971-7.905927-87.208457-0.12163-1.702815-0.486519-3.284-0.851407-5.838223 7.05452-0.851408 13.74415-2.189334 20.55541-2.189334 18.366077 0 36.732153 0.486519 55.21986 0.973037 4.743556 0.12163 6.81126 3.284 7.05452 7.662668 0.608148 9.122224 1.459556 18.122817 1.459555 27.245041 0.12163 42.813636-0.12163 85.748901 0.24326 128.562537 0.364889 34.177931 1.459556 68.477491 2.189333 102.655423v8.635704zM601.62795 485.423922c-4.378667-35.029338-8.757335-69.207269-13.257631-104.844756 11.433187-0.12163 22.866374-0.486519 34.177931-0.486518 3.770519 0 5.473334 2.067704 5.838223 6.203112 3.040741 31.866968 6.203112 63.733935 9.487112 96.817199-11.798076 0.608148-23.961041 1.459556-36.245635 2.310963zM830.778206 390.552797c9.730372 0 20.068892-0.12163 30.529041 0 5.230075 0.12163 7.784297 2.189334 7.784298 8.392446-0.364889 29.677634-0.12163 59.355268-0.12163 88.911272v6.689631c-12.527854-0.608148-24.569189-1.216296-38.070079-1.824445-0.12163-33.691412-0.12163-67.504454-0.12163-102.168904zM558.327796 492.478442c-6.081482-33.934672-12.284594-67.626084-18.487706-102.168904 11.068298-1.702815 22.136596-3.52726 33.083264-4.865186 4.865186-0.608148 4.013778 3.648889 4.257037 6.324742 1.337926 11.433187 2.310963 22.744744 3.52726 34.177931 1.946074 17.879558 3.892149 35.759116 5.716594 53.517044 0.243259 2.310963 0 4.743556 0 7.297779-9.243853 1.946074-18.487706 3.770519-28.096449 5.716594zM780.423532 390.917686c10.33852 0 20.67704 0.12163 30.89393-0.121629 4.621927-0.12163 6.324742 0.851408 6.203112 6.203112-0.364889 14.230669 0.12163 28.461337 0.24326 42.813635 0.12163 17.636299 0 35.394227 0 52.908897-10.46015 1.094667-19.582373 1.946074-29.434375 3.040741-2.554223-34.42119-5.230075-68.720751-7.905927-104.844756z"
                                  fill="#f25d8e"></path>
                        </svg>
                    </a>
                <?php endif; ?>
                <a href="<?php $this->options->feedUrl(); ?>" target="_blank" ks-tag="bottom" ks-text="RSS 订阅"><i
                            class="fa fa-rss"
                            style="color: #9c27b0"></i></a>
                <?php $this->options->home_social() ?>
            </div>
        </div>
    </section>
    <section class="paul-news">
        <div class="news-item">
            <div class="news-head">
                <h3 class="title"><i class="fa fa-book"></i>最新博文</h3>
                <h3 class="more"><a href="<?php $this->options->blog_url(); ?>" target="_blank"><i
                                class="fa fa-chevron-right"></i></a>
                </h3>
            </div>
            <?php if ($this->options->RSS): ?>
                <div class="news-body">
                    <div class="row s">
                        <?php $rss = parse_RSS($this->options->RSS, $this->options->themeUrl);
                        echo $rss
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($GLOBALS['project']): ?>
            <div class="news-item">
                <div class="news-head grey">
                    <h3 class="title"><i class="fa fa-leaf"></i>代表作品</h3>
                    <h3 class="more"><a href="https://paul.ren/project"><i
                                    class="fa fa-chevron-right"></i></a></h3>
                </div>
                <div class="news-body">
                    <div class="row s">
                        <?php foreach ($GLOBALS['stack'] as $work) {
                            if ($work['template'] == 'page-works_info.php'):
                                // 解析介绍页 JSON 格式
                                $JSON = json_decode($work['text'], true);
                                $img = $JSON['project_img'] ? $JSON['project_img'] : $this->options->themeUrl . '/src/img/Kico.jpg';
                                echo '<div class="col-4 col-m-2" >
                        <a href="' . $work['permalink'] . '" class="news-project">
                            <img src="' . $img . '">
                            <h4>' . $work['title'] . '</h4>
                        </a>
                    </div>';
                            endif;
                        } ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="news-item">
            <div class="news-head red">
                <h3 class="title"><i class="fa fa-comments"></i>日记</h3>
                <h3 class="more"><a href="<?php echo $index_note ?>"><i
                                class="fa fa-chevron-right"></i></a>
                </h3>
            </div>
            <div class="news-body">
                <div class="row s">
                    <?php while ($this->next()): ?>
                        <div class="col-m-6">
                            <div class="boxed"><p>
                                    <?php $this->excerpt(80, '...'); ?></p>
                                <p><span class="date"><?php $this->date(); ?></span></p></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <div class="news-item">
            <div class="news-head green">
                <h3 class="title"><i class="fa fa-comments"></i>语录</h3>
                <h3 class="more"><a href="<?php echo $GLOBALS['say'] ?>"><i
                                class="fa fa-chevron-right"></i></a>
                </h3>
            </div>
            <div class="news-body green">
                <div class="row s">
                    <?php $says = Paul::parse_says($GLOBALS['say_text']);
                    // 输出数量
                    $num = 0;
                    foreach ($says as $text => $avatar) {
                        if ($num < 4):
                            echo '<div class="col-m-6">
                            <div class="boxed"><p>' . $avatar . '</p>
                                <p><span class="avatar">' . $text . '</span></p></div>
                            </div>
                        ';
                            $num++;
                        else:
                            break;
                        endif;
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
</main>

<?php $this->need('footer.php') ?>
