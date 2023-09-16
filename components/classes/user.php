<?php

class User {
    private $uname, $sname, $email, $mno, $pswd, $addrs, $utype;

    public function __construct($uname, $sname, $email, $mno, $pswd, $addrs, $utype) {
        $this->uname = $uname;
        $this->sname = $sname;
        $this->email = $email;
        $this->mno = $mno;
        $this->pswd = $pswd;
        $this->addrs = $addrs;
        $this->utype = $utype;
    }

    // Getter methods (as you defined them)
    public function getUname() {
        return $this->uname;
    }

    public function getSname() {
        return $this->sname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMno() {
        return $this->mno;
    }

    public function getAddrs() {
        return $this->addrs;
    }
    public function getUtype() {
        return $this->utype;
    }

    public function getPswd() {
        return $this->pswd;
    }

    // Setter methods (as you defined them)
    public function setUname($uname) {
        $this->uname = $uname;
    }

    public function setSname($sname) {
        $this->sname = $sname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMno($mno) {
        $this->mno = $mno;
    }

    public function setAddrs($addrs) {
        $this->addrs = $addrs;
    }
    public function setUtype($utype) {
        $this->utype = $utype;
    }

    public function setPswd($pswd) {
        $this->pswd = $pswd;
    }

    // Implement the serialize method
    // public function serialize() {
    //     return serialize([
    //         $this->uname,
    //         $this->sname,
    //         $this->email,
    //         $this->mno,
    //         $this->pswd,
    //         $this->addrs,
    //         $this->utype
    //     ]);
    // }

    // // Implement the unserialize method
    // public function unserialize($serialized) {
    //     list(
    //         $this->uname,
    //         $this->sname,
    //         $this->email,
    //         $this->mno,
    //         $this->pswd,
    //         $this->addrs,
    //         $this->utype
    //     ) = unserialize($serialized);
    // }
}