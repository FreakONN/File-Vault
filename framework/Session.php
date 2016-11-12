<?php
namespace Framework;

class Session
{
    /*
     The location of the temporary file is determined by a setting in the php.ini file called session.save_path.

     Most sessions set a user-key on the user's computer that looks something like this: 765487cf34ert8dede5a562e4f3a7e12.
    Then, when a session is opened on another page, it scans the computer for a user-key.
    If there is a match, it accesses that session, if not, it starts a new session.
     */
    public function __construct($cookieName = 'PHP_SESS_ID')
    {
        session_name($cookieName);
        session_start();
    }

    //postavljamo varijable za session --- npr. na nekoj stranici demo1.php
    //Pr. $_SESSION["favcolor"] = "green";

    //$this->_session->set("name", "Pero");
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    //povlačimo session varijable postavljene na demo1.php
    //echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";

    //Listing.php -- $name = $session->get("name");
    public function get($name)
    {
        if(isset($_SESSION[$name]))
        {
            return $_SESSION[$name];
        }
        return null;
    }

    public function isUserLoggedIn ()
    {
        //if(isset($_SESSION['username']))
        //if(isset($_SESSION['username']))
        if($this->get("name"));
        {
            $this->loggedIn = true;
        }
        return $this->loggedIn;
        //return true;
    }



}