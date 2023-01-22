<?php

namespace Kodedrop;


class CSRF
{
    private $TokenName;
    public function Createtoken(): string
    {
        $this->TokenName = "KODEDROP_CSRF";
        $Token = base64_encode(uniqid());
        setcookie($this->TokenName, $Token, null, '/');
        return $Token;
    }
    public function CheckToken($FormToken): bool
    {
        $this->TokenName = "KODEDROP_CSRF";
        $veri = false;
        if (isset($_COOKIE[$this->TokenName])) {
            if ($_COOKIE[$this->TokenName] == $FormToken) {
                $veri = true;
            } else {
                $veri = false;
            }
        } else {
            $veri = false;
        }
        return $veri;
    }

    public static function Create()
    {
        return (new self)->Createtoken();
    }
    public static function Check($FormToken)
    {
        return (new self)->CheckToken($FormToken);
    }
}
