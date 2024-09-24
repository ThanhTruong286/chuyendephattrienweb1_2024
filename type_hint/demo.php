<?php

// Bật chế độ strict mode trong PHP
declare(strict_types=1);
require_once('A.php');
require_once('B.php');
require_once('C.php');

class Demo {
    //1 type A return A
    public function typeAReturnA():A//type X
    {
        echo __FUNCTION__."<br>";
        return new A();// return Y
    }
    //2 type B return A
    public function typeBReturnA():B//type X
    {
        echo __FUNCTION__."<br>";
        return new A();// return Y
    }
    //3 type C return A
    public function typeCReturnA():C//type X
    {
        echo __FUNCTION__."<br>";
        return new A();// return Y
    }
    //4 type I return A
    public function typeIReturnA():I//type X
    {
        echo __FUNCTION__."<br>";
        return new A();// return Y
    }
    //5 type NULL return A
    public function typeNULLReturnA():NULL//type X
    {
        echo __FUNCTION__."<br>";
        return new A();// return Y
    }
    //6 type A return B
    public function typeAReturnB():A//type X
    {
        echo __FUNCTION__."<br>";
        return new B();// return Y
    }
    //7 type B return B
    public function typeBReturnB():B//type X
    {
        echo __FUNCTION__."<br>";
        return new B();// return Y
    }
    //8 type C return B
    public function typeCReturnB():C//type X
    {
        echo __FUNCTION__."<br>";
        return new B();// return Y
    }
    //9 type I return B
    public function typeIReturnB():I//type X
    {
        echo __FUNCTION__."<br>";
        return new B();// return Y
    }
    //10 type NULL return B
    public function typeNULLReturnB():NULL//type X
    {
        echo __FUNCTION__."<br>";
        return new B();// return Y
    }
    //11 type A return C
    public function typeAReturnC():A//type X
    {
        echo __FUNCTION__."<br>";
        return new C();// return Y
    }
    //12 type B return C
    public function typeBReturnC():B//type X
    {
        echo __FUNCTION__."<br>";
        return new C();// return Y
    }
    //13 type C return C
    public function typeCReturnC():C//type X
    {
        echo __FUNCTION__."<br>";
        return new C();// return Y
    }
    //14 type I return C
    public function typeIReturnC():I//type X
    {
        echo __FUNCTION__."<br>";
        return new C();// return Y
    }
    //15 type NULL return C
    public function typeNULLReturnC():NULL//type X
    {
        echo __FUNCTION__."<br>";
        return new C();// return Y
    }
    //16 type A return I
    public function typeAReturnI():A//type X
    {
        echo __FUNCTION__."<br>";
        return new I();// return Y
    }
    //17 type B return I
    public function typeBReturnI():B//type X
    {
        echo __FUNCTION__."<br>";
        return new I();// return Y
    }
    //18 type C return I
    public function typeCReturnI():C//type X
    {
        echo __FUNCTION__."<br>";
        return new I();// return Y
    }
    //19 type I return I
    public function typeIReturnI():I//type X
    {
        echo __FUNCTION__."<br>";
        return new I();// return Y
    }
    //20 type NULL return I
    public function typeNULLReturnI():NULL//type X
    {
        echo __FUNCTION__."<br>";
        return new I();// return Y
    }
    //21 type A return NULL
    public function typeAReturnNULL():A//type X
    {
        echo __FUNCTION__."<br>";
        return NULL;// return Y
    }
    //22 type B return NULL
    public function typeBReturnNULL():B//type X
    {
        echo __FUNCTION__."<br>";
        return NULL;// return Y
    }
    //23 type C return NULL
    public function typCReturnNULL():C//type X
    {
        echo __FUNCTION__."<br>";
        return NULL;// return Y
    }
    //24 type I return NULL
    public function typeIReturnNULL():I//type X
    {
        echo __FUNCTION__."<br>";
        return NULL;// return Y
    }
    //25 type NULL return NULL
    public function typeNULLReturnNULL():NULL//type X
    {
        echo __FUNCTION__."<br>";
        return NULL;// return Y
    }
}

$demo = new Demo();
$demo->typeBReturnA();