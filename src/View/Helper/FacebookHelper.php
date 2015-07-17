<?php
/**
 * JorgeFacebook Facebook Helper
 *
 * @author Jorge Jardim
 * @copyright (c) 2015 jorgejardim.com.br
 * @license MIT
 */
namespace JorgeFacebook\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Core\Configure;
use Facebook\Facebook;

class FacebookHelper extends Helper {

    public $fb;

    public function __construct(View $view, $config = []) {

        parent::__construct($view, $config);

        $this->fb = new Facebook([
            'app_id' => Configure::read('Facebook.app_id'),
            'app_secret' => Configure::read('Facebook.app_secret'),
            'default_graph_version' => 'v2.4',
            //'default_access_token' => '{access-token}'
        ]);
    }

    public function getLoginUrl() {
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email'];
        return $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);
    }
}