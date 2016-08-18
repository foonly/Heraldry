<?php

class news {
    protected $id;
    protected $header;
    protected $content;
    protected $postdate;
    protected $poster;
    protected $user;

    function __construct($itemId) {
        $item = self::getNewsItem($itemId);
        $this->id = $item['id'];
        $this->header = $item['header'];
        $this->content = $item['content'];
        $this->postdate = $item['postdate'];
        $this->poster = new user($item['poster']);
    }

    static function getNewsList() {
        $sql = "
            select
              blog.id,
              blog.header,
              blog.content,
              blog.postdate,
              blog.poster,
              users.fname as fname,
              users.lname as lname
            from
              blog LEFT JOIN users
            ON
              blog.poster = users.id
            order by
              postdate desc
            ";

        $query = $GLOBALS['db']->query($sql);

        $news = Array();
        while ($news_row = $query->fetch()) {
            $news[] = $news_row;
        }
        return $news;
    }
    static function getNewsComments($post) {
        /* comments */
        $sql = "
		  select
		    blog_comments.id,
			blog_comments.parent,
			blog_comments.content,
			blog_comments.poster,
			blog_comments.postdate,
			users.fname as fname,
			users.lname as lname
		  from
		    blog_comments LEFT JOIN users
		  ON
		    blog_comments.poster = users.id
		  where
		    parent = ?
		   order by
              postdate desc
		";


        $comment = $GLOBALS['db']->prepare($sql);
        $comment->execute(array($post));

        $comments = Array();
        /* loop comments */
        while ($comment_r = $comment->fetch()) {
            $comments[] = $comment_r;
        }
        return $comments;
    }

    static function getNewsItem($item) {
        $sql = "
          select
            blog.id,
            blog.header,
            blog.content,
            blog.postdate,
            blog.poster,
            users.fname as fname,
            users.lname as lname
          from
            blog LEFT JOIN users
          ON
            blog.poster = users.id
          where
            blog.id = ?
		  ";

        $query = $GLOBALS['db']->prepare($sql);
        $query->execute(array($item));

        return $query->fetch();
    }
}


