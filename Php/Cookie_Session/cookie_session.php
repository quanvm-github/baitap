<?php
    session_start();
    $name = "user";
    $value = "user_value";
    if (isset($_POST["value"])) {
        switch ($_POST["value"]) {
            case "getcookie":
                getCookie($name, $value);
                break;

            case "checkcookie":
                checkCookie($name);
                break;

            case "deletecookie":
                deleteCookie($name);
                break;

            case "getsession":
                getSession($name, $value);
                break;

            case "checksession":
                checkSession($name);
                break;

            case "deletesession":
                deleteSession($name);
                break;

            default:
                break;
        }
    }

    function getCookie($cookie_name, $cookie_value)
    {
        if (isset($_COOKIE[$cookie_name])) {
            echo "Already have cookie <br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
        else {
            setcookie($cookie_name, $cookie_value, time() + 300); // 5 minutes
            echo "Your cookie is set";
        }
    }

    function checkCookie($cookie_name)
    {
        if (isset($_COOKIE[$cookie_name])) {
            echo "Already have cookie <br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
        else {
            echo "Cookie is not set";
        }
    }

    function deleteCookie($cookie_name)
    {
        if (isset($_COOKIE[$cookie_name])) {
            setcookie($cookie_name, "", time() - 3600); // delete
            echo "Your cookie is delete";
        }
        else {
            echo "Cookie is not set";
        }
    }

    function getSession($session_name, $session_value)
    {
        if (isset($_SESSION[$session_name])) {
            echo "Already have session <br>";
            echo "Value is: " . $_SESSION[$session_name];
        }
        else {
            $_SESSION[$session_name] = $session_value;
            echo "Your session is set";
        }
    }

    function checkSession($session_name)
    {
        if (isset($_SESSION[$session_name])) {
            echo "Already have session <br>";
            echo "Value is: " . $_SESSION[$session_name];
        }
        else {
            echo "Session is not set";
        }
    }

    function deleteSession($session_name)
    {
        if (isset($_SESSION[$session_name])) {
            unset($_SESSION[$session_name]);
            echo "Your session is delete";
        }
        else {
            echo "Session is not set";
        }
    }