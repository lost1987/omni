<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-7-28
 * Time: 下午2:05
 * 统管启动执行类
 */
use core\Process;
use core\Configure;
use core\Cache;
use core\DB;
use core\Fpm;
use core\Input;
use interfaces\IStartup;

class Omni
{

    private static $_instance = null;

    private $_startup;

    private function __construct()
    {
        if (XHPROF_ENABLE)
            xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
        $this->base_init();
        $mode = php_sapi_name();
        switch ($mode) {
            case 'cli' :
                $this->cli_init();
                break;

            default:
                $this->fpm_init();
        }
    }

    static function instance()
    {
        if (self::$_instance == null)
            self::$_instance = new Omni();
        return self::$_instance;
    }

    /**
     * 通用初始化
     */
    private function base_init()
    {
        spl_autoload_register(array('Autoload', 'load'));

        $this->config = Configure::instance();
        /*加载通用配置文件**/
        $this->config->load(array('common'));
    }


    private function cli_init()
    {
        $maps = require(BASE_PATH . '/conf/process.inc.php');
        $this->db = new DB('deamon');
        $this->_startup = Process::instance($maps);
    }


    private function fpm_init()
    {
        /*设置编码**/
        header("content-type:text/html;charset=utf8");

        /*设置时区***/
        date_default_timezone_set("Asia/Shanghai");

        /*输入类**/
        $this->input = Input::instance();

        /*运行pathinfo 解析**/
        $this->_startup = Fpm::instance();
    }


    /**
     * 执行 同一入口只运行一次
     * @param  string $dir 入口文件所在文件夹名称
     */
    function run($dir = null)
    {
        /*加载独立配置文件**/
        if (!empty($dir))
            $this->config->load(array($dir));

        $_config = $this->config->$dir;

        /*数据库初始化**/
        $init_db = $_config['init_db'];
        if ($init_db != '') {
            $this->db = new DB();
            $this->db->init_db_from_config($init_db);
        }

        /*检查缓存是否开启**/
        if ($_config['memcache']['enable'])
            $this->cache = Cache::instance($_config['memcache']);

        /*html模板初始化**/
        if ($_config['twig']['enable']) {
            $loader = new Twig_Loader_Filesystem(BASE_PATH . '/' . BASE_PROJECT . $_config['twig']['template_dir']);
            $this->tpl = new Twig_Environment($loader, array(
                'debug' => true,
                'auto_reload' => true,
                'cache' => $_config['twig']['cache_enable'] ? BASE_PATH . '/' . BASE_PROJECT . $_config['twig']['cache_dir'] : false
            ));
        }

        if ($this->_startup instanceof IStartup)
            $this->_startup->run($dir, $this);

        if (XHPROF_ENABLE) {
            $run_data = xhprof_disable();//返回运行数据

            include BASE_PATH . "/libs/xhprof_lib/utils/xhprof_lib.php";
            include BASE_PATH . "/libs/xhprof_lib/utils/xhprof_runs.php";

            $objXhprofRun = new XHProfRuns_Default();

            // 第一个参数j是xhprof_disable()函数返回的运行信息
            // 第二个参数是自定义的命名空间字符串(任意字符串),
            // 返回运行ID,用这个ID查看相关的运行结果
            $objXhprofRun->save_run($run_data, "xhprof");
        }
    }

}