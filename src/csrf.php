<?php

namespace Kodedrop;


class CSRF
{
    private $TokenName;
    public function Create(): string
    {
        $this->TokenName = "KODEDROP_CSRF";
        $Token = base64_encode(uniqid());
        setcookie($this->TokenName, $Token, null, '/');
        return $Token;
    }
    public function Check($FormToken): bool
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
}
