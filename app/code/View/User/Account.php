<?php
namespace View\User;
use Framework;
//http://localhost/File-vault/user/handle/register
class Register extends Framework\ViewAbstract
{
    public $baseUrl;
    public $tite;

    public function __construct()
    {
        $this->baseUrl = $this->_dependencies["config"]->getSetting("base_url");
        $this->title = "File Vault Account Page";
    }

    public function output()
    {
        $this->setTemplate("user/account.phtml")->render();
    }
}