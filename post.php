<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
$this->need('header.php');
require_once 'functions.php';
$this->widget('Widget_Contents_Page_List')->to($pages);
global $pages_note, $pages_say;
while ($pages->next()):
    switch ($pages->slug) {
        case 'note':
            $pages_note = $pages->permalink;
            break;
        case 'saying':
            $pages_say = $pages->permalink;
            break;
        default:
            break;
    }
endwhile;
?>


<main class="is-article">
    <nav class="navigation">
        <a href="<?php echo $pages_note; ?>" class="active">日记</a>
        <?php if ($this->options->blog_url): ?> <a href="<?php $this->options->blog_url(); ?>" target="_blank">
                博文</a><?php endif; ?>
        <?php if ($pages_say): ?><a href="<?php echo $pages_say; ?>">语录</a><?php endif; ?>
    </nav>
    <article>
        <h1 style="position: relative"><?php echo $this->date('Y-m-d'); ?>
            <small>(<?php echo $this->date('l'); ?>)</small>
            <div
                    style="font-weight: 400;position: absolute;top: 0;left: 0;right: 0;bottom: 0;text-align: center"><?php $this->title() ?></div>
        </h1>
        <div class="paul-note" id="<?php $this->cid() ?>">
            <div class="note-content">
                <?php $this->content(); ?>
            </div>
            <?php if ($this->options->author_text): ?>
                <div class="note-content">
                    <?php $this->options->author_text(); ?>
                </div>
            <?php endif; ?>
            <div class="note-inform">
                <span class="user"><?php $this->author(); ?></span>
                <span class="views" title="阅读次数 <?php echo $this->views ?>"><i class="fa fa-leaf"
                                                                               aria-hidden="true"></i> <?php echo $this->views ?></span>
                <span class="words" title="字数 <?php echo get_words($this) ?>"><i class="fa fa-file-word-o"
                                                                                 aria-hidden="true"></i> <?php echo get_words($this) ?></span>
                <a href="https://creativecommons.org/licenses/by-nc-sa/3.0/cn/" style="color: currentColor;" target="_blank"><span class="CC BY-NC-SA 3.0 CN"
                                                                                      title="署名-非商业性使用-相同方式共享 3.0 中国大陆 (CC BY-NC-SA 3.0 CN)"><i
                                class="fa fa-cc" aria-hidden="true"></i></span></a>
            </div>
            <div class="note-action">
                    <span class="comment" data-cid="<?php $this->cid(); ?>" data-year="<?php $this->year(); ?>"
                          title="参与评论">评论</span>
                <span class="like" data-cid="<?php $this->cid();
                ?>" title="已有 <?php get_like_num($this) ?> 人点赞"><?php get_like_num($this) ?></span>
            </div>
        </div>
    </article>
    <?php $this->need('comments.php') ?>
    <script src="<?php $this->options->themeUrl('src/index.js') ?>"></script>
    <script>
        (function () {
            // 点赞实现 ajax
            const Like_btn = document.querySelectorAll('.like');
            for (let el of Like_btn) {
                el.onclick = function (e) {
                    const that = this;
                    ks.ajax({
                        method: "POST",
                        data: {
                            type: "up",
                            cid: this.getAttribute('data-cid'),
                            cookie: document.cookie,

                        },
                        url: "<?php $this->options->siteUrl(); ?>index.php/action/void_like?up",
                        success: function (res) {
                            if (JSON.parse(res.responseText)['status'] === 1) {
                                that.innerHTML = parseInt(that.innerHTML) + 1;
                                ks.notice("感谢你的点赞~", {color: "green", time: 1500});
                                that.onclick = function () {
                                    ks.notice("你的爱我已经感受到了！", {color: "yellow", time: 1500});
                                }
                            } else if (JSON.parse(res.responseText)['status'] === 0) {
                                ks.notice("你的爱我已经感受到了！", {color: "yellow", time: 1500});
                            }
                        },
                        failed: function (res) {
                            ks.notice("FXXK！提交出错了！", {color: "red"});
                        }
                    })
                }
            }
        }())
    </script>
</main>

<?php $this->footer(); ?>
<?php $this->need('footer.php'); ?>

