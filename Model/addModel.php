<?php


class addModel
{

    private $title;
    private $text;
    private $alias;
    private $menu_name;
    private $menu_data;
    private $without_menu;
    private $publication;

    public function __construct(Request $request)
    {
        $this->title = $request->post('title');
        $this->text = $request->post('text');
        //  $this ->alias = $request->post('alias');
        $this->menu_name = $request->post('menu_name');
        $this->menu_data = $request->post('menu');
        $this->without_menu = $request->post('without_menu');
        $this->publication = $request->post('publication');

    }

    public function isValid()
    {
        return !empty($this->title);
    }

    public function inMenu()
    {
        return empty($this->without_menu);
    }

    public function isMenuName()
    {
        return empty($this->menu_name);
    }

    public function createAlias($title_name, $menu_data)
    {

        $translitClass = new Translit($title_name);
        $translit = $translitClass->translit;

        if ($menu_data) {
            $alias_data_arr = explode('!', $menu_data);
            $alias_parent = $alias_data_arr[0];
            $id_parent = $alias_data_arr[1];
            $slash = '/';
        }else{
            $alias_parent ='';
            $slash = '';
            $id_parent = '';
        }
        $new_alias = $alias_parent . $slash . $translit;
        $alias_data = array(
            'new_alias' => $new_alias,
            'id_parent' => $id_parent,
            'translit' => $translit
        );
        return $alias_data;
    }


    public function addBasicPage($title, $menu_data, $publication, $text = null, $menu_name = null)
    {
        $title_or_menu_name = isset($menu_name) ? $menu_name : $title;
        $alias_data = $this->createAlias($title_or_menu_name, $menu_data);
        $publish = isset($publication) ? 1 : 0;

        $placeholders = array(
            'controller' => 'Index',
            'action' => 'index',
            'publish' => $publish
        );
        $dbc = Connect::getConnection();
        $sql = "INSERT INTO `pages`(`id_mat_type`, `status`, `controller`, `action`) VALUES (1,:publish,:controller,:action)";
        $sth = $dbc->getPDO()->prepare($sql);
        $sth->execute($placeholders);

        $sql = "SELECT MAX(id) AS max_id FROM pages";
        $placeholders = array();
        $date = $dbc->getDate($sql, $placeholders);
        $id_new_page = $date[0]['max_id'];

        $placeholders = array(
            'id_new_page' => $id_new_page
        );
        $sql = "INSERT INTO `basic_page`(`id_page`) VALUES (:id_new_page)";
        $sth = $dbc->getPDO()->prepare($sql);
        $sth->execute($placeholders);

        $placeholders = array(
            'id_new_page' => $id_new_page,
            'id_parent' => $alias_data['id_parent']
        );
        $sql = "INSERT INTO `main_menu`(`id_page`, `id_parent_page`, `status`) VALUES (:id_new_page,:id_parent,1)";
        $sth = $dbc->getPDO()->prepare($sql);
        $sth->execute($placeholders);



        $sql = "SELECT MAX(id) AS max_id FROM basic_page";
        $placeholders = array();
        $date = $dbc->getDate($sql, $placeholders);
        $id_new_page = $date[0]['max_id'];

        $sql = "SELECT MAX(id) AS max_id FROM main_menu";
        $placeholders = array();
        $date = $dbc->getDate($sql, $placeholders);
        $id_new_menu = $date[0]['max_id'];




        $placeholders = array(
            'id_new_menu' => $id_new_menu,
            'title' => $title,
            'alias' => $alias_data['new_alias']
        );
        $lang = Config::get('default_language');

        $sql = "INSERT INTO `main_menu_{$lang}`(`id_main_menu`, `name`, `alias_menu`) VALUES (:id_new_menu,:title,:alias)";
        $sth = $dbc->getPDO()->prepare($sql);
        $sth->execute($placeholders);






        $placeholders = array(
            'id_new_page' => $id_new_page,

            'title' => $title,
            'text' => $text,
            'alias' => $alias_data['new_alias']
        );
        $lang = Config::get('default_language');

        $sql = "INSERT INTO basic_page_{$lang} (`id_basic_page`,`title`, `text`, `alias`) VALUES (:id_new_page, :title, :text, :alias)";
        $sth = $dbc->getPDO()->prepare($sql);
        $sth->execute($placeholders);

        $placeholders = array(
            'id_new_page' => $id_new_page
        );
        foreach(Config::get('languages') as $v){
            if($v != Config::get('default_language')){
                $sql = "INSERT INTO basic_page_{$v} (`id_basic_page`) VALUES (:id_new_page)";
                $sth = $dbc->getPDO()->prepare($sql);
                $sth->execute($placeholders);
            }
        }






        //$date = $dbc->getDate($sql, $placeholders);

    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getMenuName()
    {
        return $this->menu_name;
    }

    public function getMenuData()
    {
        return $this->menu_data;
    }

    public function getWithoutMenu()
    {
        return $this->without_menu;
    }

    public function getPublication()
    {
        return $this->publication;
    }


}