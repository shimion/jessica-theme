<?php
/**
*
*/
class C5_TGM_PLUGINS
{

    function __construct(){
        add_filter( 'c5_fw_tgmpa', array($this, 'plugins') );
    }
    public function plugins($plugins)
    {
        $plugins[] = array(
            'name'               => 'Arqam',
            'slug'               => 'arqam',
            'source'             => 'http://files.code125.com/arqam.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => true,
        );


        return $plugins;
    }
}
$obj = new C5_TGM_PLUGINS();
?>
