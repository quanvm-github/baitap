<?php
    session_start();
    $name = "user";
    $value = "user_value";
    if (isset($_POST["value"])) {
        switch ($_POST["value"]) {
            case "getcookie":
                getcookie($name, $value);
                break;

            case "checkcookie":
                checkcookie($name);
                break;

            case "deletecookie":
                deletecookie($name);
                break;

            case "getsession":
                getsession($name, $value);
                break;

            case "checksession":
                checksession($name);
                break;

            case "deletesession":
                deletesession($name);
                break;

            default:
                break;
        }
    }

    function getcookie($cookie_name, $cookie_value) {
        if (isset($_COOKIE[$cookie_name])) {
            echo "Already have cookie <br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
        else {
            setcookie($cookie_name, $cookie_value, time() + 300); // 5 minutes
            echo "Your cookie is set";
        }
    }

    function checkcookie($cookie_name) {
        if (isset($_COOKIE[$cookie_name])) {
            echo "Already have cookie <br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
        else {
            echo "Cookie is not set";
        }
    }

    function deletecookie($cookie_name) {
        if (isset($_COOKIE[$cookie_name])) {
            setcookie($cookie_name, "", time() - 3600); // delete
            echo "Your cookie is delete";
        }
        else {
            echo "Cookie is not set";
        }
    }

    function getsession($session_name, $session_value) {
        if (isset($_SESSION[$session_name])) {
            echo "Already have session <br>";
            echo "Value is: " . $_SESSION[$session_name];
        }
        else {
            $_SESSION[$session_name] = $session_value;
            echo "Your session is set";
        }
    }

    function checksession($session_name) {
        if (isset($_SESSION[$session_name])) {
            echo "Already have session <br>";
            echo "Value is: " . $_SESSION[$session_name];
        }
        else {
            echo "Session is not set";
        }
    }

    function deletesession($session_name) {
        if (isset($_SESSION[$session_name])) {
            unset($_SESSION[$session_name]);
            echo "Your session is delete";
        }
        else {
            echo "Session is not set";
        }
    }