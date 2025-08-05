<?php

class Menu
{
  public $boardPath;
  public $dirList;
  public $menuPath;
  public $boardNumList;

  private $data;
  private $site_name;
  private $menuItems;
  private $curPage;
  private $pageTitle;

  public function __construct()
  {
    $this->setInfo();
    $this->data = getJSON($this->menuPath);
    $this->setData();
    $this->setPages();
    $this->setPageIsActive();
    $this->setPageTitle();
  }

  public function getSiteName()
  {
    return $this->site_name;
  }

  public function setData()
  {
    $this->site_name = $this->data['site_name'];
  }

  public function setPageTitle()
  {
    $title = $this->site_name;
    $menuItems = $this->menuItems;

    if (!$this->curPage) {
      $this->pageTitle = $title;
      return;
    }
    $curIndex = $this->curPage['index'];

    foreach ($curIndex as $k => $v) {
      switch ($k) {
        case 0:
          $title = $menuItems[$curIndex[0]]['title'] . ' | ' . $title;
          break;
        case 1:
          $title = $menuItems[$curIndex[0]]['pages'][$curIndex[1]]['title'] . ' | ' . $title;
          break;
        case 2:
          $title = $menuItems[$curIndex[0]]['pages'][$curIndex[1]]['pages'][$curIndex[2]]['title'] . ' | ' . $title;
          break;
      }
    }

    $this->pageTitle = $title;
  }

  public function setPageIsActive()
  {
    $newItems = $this->menuItems;
    if (!$this->curPage) return;

    $curIndex = $this->curPage['index'];

    foreach ($curIndex as $i => $v) {
      switch ($i) {
        case 0:
          $newItems[$curIndex[0]]['isActive'] = true;
          break;
        case 1:
          $newItems[$curIndex[0]]['pages'][$curIndex[1]]['isActive'] = true;
          break;
        case 2:
          $newItems[$curIndex[0]]['pages'][$curIndex[1]]['pages'][$curIndex[2]]['isActive'] = true;
          break;
      }
    }

    $this->menuItems = $newItems;
  }

  public function setInfo()
  {
    global $DIR_LIST, $BOARD_PATH, $BOARD_NUM_LIST;

    $this->dirList = $DIR_LIST;
    $this->boardPath = $BOARD_PATH;
    $this->boardNumList = $BOARD_NUM_LIST;

    $area = $this->getAreaFromUri();

    $filename = $area && file_exists($_SERVER['DOCUMENT_ROOT'] . "/json/menu.$area.json")
      ? "menu.$area.json"
      : "menu.json";

    $jsonPath = $_SERVER['DOCUMENT_ROOT'] . "/json/$filename";

    $this->menuPath = $jsonPath ?: '';
  }

  private function getAreaFromUri()
  {
    $uri = $_SERVER['REQUEST_URI'];
    $segments = explode('/', trim($uri, '/'));
    return isset($segments[0]) ? $segments[0] : null;
  }

  public function setPages()
  {
    $pages = $this->data['pages'];
    $this->menuItems = $this->setPageInfo($pages, null);
  }

  public function setPageInfo($pure_pages, $prev_page)
  {
    $pages = [];

    foreach ($pure_pages as $k => &$v) {
      $v['index'] = isset($prev_page['index']) ? array_merge($prev_page['index'], [$k]) : [$k];
      $v['dirname'] = $this->getDirname($prev_page, $v);

      if (array_key_exists('pages', $v) && count($v['pages'])) {
        $childPage = $this->setPageInfo($v['pages'], $v);
        $v['pages'] = $childPage;
      }

      $v['path'] = $this->getPath($prev_page, $v);
      $v['target'] = "_self";

      if (preg_match('/\.(com|co\.kr|org|io|ne\.kr)/', $v['path'])) {
        $v['target'] = "_blank";
      }

      $v['isActive'] = $this->isPageActive($v);
      if ($v['isActive'] && !$this->curPage) $this->curPage = $v;

      $pages[] = $v;
    }
    unset($v);

    return $pages;
  }

  public function isPageActive($page)
  {
    $uri = $_SERVER['REQUEST_URI'];
    $path_list = parse_url($page['path']);
    $params = [];

    if (isset($path_list['query'])) {
      parse_str($path_list['query'], $params);
    }

    if (isset($params['board_no'])) {
      foreach ($params as $k => $v) {
        if (!isset($_GET[$k]) || $_GET[$k] !== $v) {
          return false;
        }
      }
      return true;
    } else {
      return $page['path'] === $uri;
    }
  }

  public function getDirname($prev_page, $v)
  {
    $prev_dirname = isset($prev_page['dirname']) ? $prev_page['dirname'] : '';
    $page_dirname = isset($v['dirname']) ? $v['dirname'] : '';

    if ($prev_dirname && $page_dirname) return "$prev_dirname/$page_dirname";
    if ($prev_dirname) return $prev_dirname;
    return $page_dirname;
  }

  /*
  public function getPath($prev_info, $v)
  {
    if (isset($v['ext_link'])) return $v['ext_link'];

    if (isset($v['board_no'])) {
      $params = "?board_no=" . $v['board_no'];
      if (isset($v['category_no'])) {
        $params .= "&category_no=" . $v['category_no'];
      }
      return $this->boardPath . $params;
    }

    if (!isset($v['filename']) || empty($v['filename'])) {
      if (isset($v['pages']) && count($v['pages']) > 0) {
        return $v['pages'][0]['path'];
      }
      return $this->getFile('index');
    }

    $path = !empty($prev_info['dirname'])
      ? $prev_info['dirname'] . '/' . $v['filename']
      : $v['filename'];
    return $this->getFile($path);
  }*/


  public function getPath($prev_info, $v)
  {
      if (isset($v['ext_link'])) return $v['ext_link'];

      if (isset($v['board_no'])) {
          $params = "?board_no=" . $v['board_no'];
          if (isset($v['category_no'])) {
              $params .= "&category_no=" . $v['category_no'];
          }
          return $this->boardPath . $params;
      }

      if (!isset($v['filename']) || empty($v['filename'])) {
          if (isset($v['pages']) && count($v['pages']) > 0) {
              return $v['pages'][0]['path'];
          }
          return $this->getFile('index');
      }

      $path = !empty($prev_info['dirname'])
          ? $prev_info['dirname'] . '/' . $v['filename']
          : $v['filename'];

      $fullPath = $this->getFile($path);

      if (isset($v['get']) && is_array($v['get'])) {
          $query = http_build_query($v['get']);
          $fullPath .= '?' . $query;
      }

      return $fullPath;
  }


  public function getCurPageIndex()
  {
    return $this->curPage ? $this->curPage['index'] : null;
  }

  public function getCurPageList()
  {
    $curPageList = [];
    $menuItems = $this->menuItems;

    $curPageIndex = $this->getCurPageIndex();
    if (!$curPageIndex) return null;

    foreach ($curPageIndex as $i => $v) {
      switch ($i) {
        case 0:
          $curPageList[] = $menuItems[$curPageIndex[0]];
          break;
        case 1:
          $curPageList[] = $menuItems[$curPageIndex[0]]['pages'][$curPageIndex[1]];
          break;
        case 2:
          $curPageList[] = $menuItems[$curPageIndex[0]]['pages'][$curPageIndex[1]]['pages'][$curPageIndex[2]];
          break;
      }
    }

    return $curPageList;
  }

  public function getFile($path)
  {
    return $this->dirList['pages'] . '/' . $path . '.php';
  }

  public function getCurPage()
  {
    return $this->curPage ?? null;
  }

  public function getMenuItems()
  {
    return $this->menuItems;
  }

  public function getPageTitle()
  {
    return $this->pageTitle;
  }
}