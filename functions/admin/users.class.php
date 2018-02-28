<?php

class users {
    protected $id;
    protected $email;
    protected $fname;
    protected $lname;
    protected $created;
    protected $lvl;

    function __construct($itemId) {
        $item = self::getUserItem($itemId);
        $this->id = $item['id'];
        $this->email = $item['email'];
        $this->fname = $item['fname'];
        $this->lname = $item['lname'];
        $this->lvl = $item['lvl'];
    }

    static function getUserList() {
        $sql = "
            select
              email,
              fname,
              lname,
              created,
              lvl
            from
              users
           
            order by
              created desc
            ";

        $query = $GLOBALS['db']->query($sql);

        $users = Array();
        while ($user_row = $query->fetch()) {
            $users[] = $user_row;
        }
        return $users;
    }
    

    static function getUserItem($item) {
        $sql = "
          select
            email,
              fname,
              lname,
              created,
              lvl
          from
            users
          
          where
            id = ?
		  ";

        $query = $GLOBALS['db']->prepare($sql);
        $query->execute(array($item));

        return $query->fetch();
    }
}


