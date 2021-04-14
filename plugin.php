<?php

/**

 * 在您的网站上增加一个CrispChat，方便在线交流。

 * @package CrispChat

 * @author WhiteBear

 * @version 1.0.0

 * @link https://www.coder-bear.com/

 */

class CrispChat_Plugin implements Typecho_Plugin_Interface

{

    /**

     * 激活插件方法,如果激活失败,直接抛出异常

     *

     * @access public

     * @return void

     * @throws Typecho_Plugin_Exception

     */

    public static function activate()

    {

        Typecho_Plugin::factory('Widget_Archive')->header = array('CrispChat_Plugin', 'headjs');

        
    }

   

    /**

     * 禁用插件方法,如果禁用失败,直接抛出异常

     *

     * @static

     * @access public

     * @return void

     * @throws Typecho_Plugin_Exception

     */

    public static function deactivate(){

	}

   

    /**

     * 获取插件配置面板

     *

     * @access public

     * @param Typecho_Widget_Helper_Form $form 配置面板

     * @return void

     */

    public static function config(Typecho_Widget_Helper_Form $form){

    

    
    $CrispChatKey = new Typecho_Widget_Helper_Form_Element_Text('CrispChatKey', null,'本处填写在设置说明中的那个网站ID','您的CrispChat网站ID[在设置说明中]');

        $form->addInput($CrispChatKey);

        

     
	}





    /**

     * 个人用户的配置面板

     *

     * @access public

     * @param Typecho_Widget_Helper_Form $form

     * @return void

     */

    public static function personalConfig(Typecho_Widget_Helper_Form $form){}  


    /**

     * 头部插入JS
     *

     * @access public

     * @param unknown $headjs
     * @return unknown

     */

    public static function headjs($headjs) {
$Options = Typecho_Widget::widget('Widget_Options')->plugin('CrispChat');
		$headjs = '<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="'.$Options->CrispChatKey.'";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>';

		echo $headjs;

    }

    

    

}
